<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('head.php'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'asset/css/support/brdcum-magesh.css';?>"></link>
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
                                        <li><a onclick="location.href='<?php echo base_url().'';?>'">Logout</a></li>
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
                                                            <?php $this->load->view('newSchool/supportHeader'); ?>
                                                             <!-- BEGIN FORM-->
                                                             <div class="portlet-title">
                                                                <div class="caption col-md-12">
                                                                 <i class="fa fa-building font-dark"></i>
                                                                    <span class="caption-subject font-dark sbold uppercase">School Land Details - II</span>
                                                                    
                                                                </div>
                                                               
                                                            </div>
                                                             <form class="form-horizontal" id="schoolnew_register1" name="schoolnew_register1"  onsubmit="event.preventDefault();return popup(this);" action="<?php echo base_url().'Newschool/formsubmit/'.$this->uri->segment(3,0);?>" method="post">
                                                                 <?php
                                                                    if($profile[0]['part_2']==1){
                                                                    ?> 
                                                                    <div class="col-md-9">
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                    <div class="form-group">
                                                                         <button type="button" id="btnedit" class="btn btn-primary" onclick="postRequest(createJSON(this.form),'<?php echo base_url().'Registration/getPartInformationByPost/'.$this->uri->segment(4,0);?>',this.form);">VIEW/EDIT</button>
                                                                    </div>
                                                                    </div>
                                                                 <?php } ?>
                                                                
                                                                <div class="form-body">
                                                         
                                                                 <div class="row">
                                                                 
                                                                <!--/span-->
                                                                
                                                              <!--/span-->
                                                            </div>
                                                            
                                                            <table class="table">
                                                                <tr>
                                                                    <td class="bg-info"><b><i class="fa fa-map-marker"></i> School Land Details</b>
                                                                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                                                                    </td>
                                                                    
                                                                </tr>
                                                                
                                                            </table>
															
                                                            <div class="row">
                                                               <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">
                                                                            Total land availability (Including Building area and Playground) <font style="color:#dd4b39;">*</font>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                            <input type="text" class="form-control" id="totsq" name="totland_sq" placeholder="Sq.Ft" maxlength="7" onchange="sqfttoacre(this);" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onchange="textvalidate(this.id,'sqftalert');" onfocus="textvalidate(this.id,'sqftalert');" required="required"/>
                                                                            <font id="sqftalert" style="color:#dd4b39;"></font>
                                                                        </div>
                                                                        
                                                                        <div class="col-md-4">
                                                                            <input type="text" class="form-control" id="totsq_1" name="totland_acre" placeholder="Acre" maxlength="7" onchange="sqfttoacre(this);" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode==46" onchange="textvalidate(this.id,'acrealert');" onfocus="textvalidate(this.id,'acrealert');" required="required"/>
                                                                            <font id="acrealert" style="color:#dd4b39;"></font>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                 <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-5">
                                                                            Whether land is available for expansion of School facilities? <font style="color:#dd4b39;">*</font>
                                                                        </label>
                                                                        <div class="col-md-3">
                                                                            <label>YES</label>&nbsp;<input type="radio" value="1" id="schoolfaci" name="schoolfaci" onchange="sbcshow2(this,'landexpan');setRequiredField(this.value,'expan_sq','1');" />
                                                                            <label>NO</label>&nbsp;<input type="radio"  value="0" id="schoolfaci1" name="schoolfaci" onchange="sbcshow2(this,'landexpan');setRequiredField(this.value,'expan_sq','1');" checked="checked"/>
                                                                        </div>
                                                                        <div class="col-md-4 landexpan">
                                                                            <input type="text" class="form-control" placeholder="Area of land (in Sq.Ft)" id="expan_sq" name="expan_sq" maxlength="7" onkeypress="return event.charCode >= 48 && event.charCode <= 57"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-9">
                                                                            Whether the School has a Playground facility? <font style="color:#dd4b39;">*</font>
                                                                        </label>
                                                                        <div class="col-md-3">
                                                                            <label>YES</label>&nbsp;<input type="radio" id="playground" value="1" name="playgroundfacil" onchange="sbcshow2(this,'playgroundfaci');sbcshow2(document.getElementById('playground1'),'playgroundavaildetails');setRequiredField(this.value,'playg,playg_1','1');document.getElementById('arrangedetails').style.visibility=(this.checked?'hidden':'');setRequiredField(this.value,'alter_address,dist_bg','1');" checked="checked"/>
                                                                            <label>NO</label>&nbsp;<input type="radio" id="playground1" value="0" name="playgroundfacil" onchange="sbcshow2(document.getElementById('playground'),'playgroundavaildetails');sbcshow2(this,'playgroundfaci');setRequiredField(this.value,'playg,playg_1','1');"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                 <div class="col-md-6 playgroundfaci">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">
                                                                            Area of the Playground (in sq.ft) <font style="color:#dd4b39;">*</font>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                            <input type="text" class="form-control" id="playg" name="playground_sq" placeholder="Sq.Ft" maxlength="7" onchange="sqfttoacre(this);" onkeypress="return event.charCode >= 48 && event.charCode <= 57"/>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <input type="text" class="form-control" id="playg_1" name="playground_acre" placeholder="Acre" maxlength="7" onchange="sqfttoacre(this);" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode==46"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6 playgroundavaildetails">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-9">Does the School have alternative arrangements for children to play outdoor games and other physical activities in adjoining playground/municipal park/other location? <font style="color:#dd4b39;">*</font></label>
                                                                
                                                                        <div class="col-md-3">
                                                                            <label>YES</label>&nbsp;<input type="radio" value="1" id="alterarrange" name="alterarrange" onchange="document.getElementById('arrangedetails').style.visibility=(this.checked?'':'hidden');setRequiredField(this.value,'alter_address,dist_bg','1');" />
                                                                             <label>NO</label>&nbsp;<input type="radio" value="0" id="alterarrange1" name="alterarrange" onchange="document.getElementById('arrangedetails').style.visibility=(this.checked?'hidden':'');setRequiredField(this.value,'alter_address,dist_bg','1');" checked="checked"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6" id="arrangedetails">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-2">Address <font style="color:#dd4b39;">*</font></label>
                                                                    
                                                                        <div class="col-md-3">
                                                                            <textarea class="form-control" id="alter_address" name="alter_address"></textarea>  
                                                                        </div>
                                                                        <label class="control-label col-md-4">Distance between the main building & playground (in meters) <font style="color:#dd4b39;">*</font></label>  
                                                                        <div class="col-md-3">
                                                                            <input type="text" class="form-control" id="dist_bg" name="dist_bg" placeholder="(in meter)" maxlength="7" onkeypress="return event.charCode >= 48 && event.charCode <= 57"/>  
                                                                        </div>                                                                 
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-6">Land Ownership <font style="color:#dd4b39;">*</font></label>
                                                                        <div class="col-md-6">
                                                                            <select class="form-control" id="landowner" name="landowner" onchange="landusage(this.value);textvalidate(this.id,'landalert');" onfocus="textvalidate(this.id,'landalert');" required="required">
                                                                                <option value="">Choose</option>
                                                                                <option value="1">Rented</option>
                                                                                <option value="2">Leased</option>
                                                                                <option value="3">Owned</option>
                                                                                <option value="4">Rental Free</option>
                                                                            </select>
                                                                             <font id="landalert" style="color:#dd4b39;"></font>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 rentdetails">
                                                                    <label class="control-label col-md-7">Amount of Rent per year (in Rs.) <font style="color:#dd4b39;">*</font></label>
                                                                     <div class="col-md-5">
                                                                         <input type="text" class="form-control" id="land_amount" name="land_amount" onkeypress="return event.charCode >= 48 && event.charCode <= 57"/>
                                                                     </div>
                                                                </div>
                                                                <div class="col-md-3 leasedetails">
                                                                    <label class="control-label col-md-7">Period of Lease (in years) <font style="color:#dd4b39;">*</font></label>
                                                                     <div class="col-md-5">
                                                                         <input type="text" class="form-control" id="period_lease" name="period_lease" maxlength="2" onkeypress="return event.charCode >= 48 && event.charCode <= 57"/>
                                                                     </div>
                                                                </div>
                                                                <div class="col-md-3 leasedetails">
                                                                    <label class="control-label col-md-3">Valid upto<font style="color:#dd4b39;">*</font></label>
                                                                     <div class="col-md-9">
                                                                         <input type="date" class="form-control" id="lease_date" name="lease_date" min="<?php echo (date('Y-m-d',strtotime('now'))); ?>"/>
                                                                     </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <table class="table">
                                                                <tr>
                                                                    <td class="bg-info"><b><i class="fa fa-map-marker"></i> School Building and Boundary Wall Details</b>
                                                                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                                                                    </td>
                                                                    
                                                                </tr>
                                                                
                                                            </table>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-4">Type of Boundary Wall <font style="color:#dd4b39;">*</font></label>
                                                                            <div class="col-md-8">
                                                                                <select class="form-control" id="wall_type" name="wall_type"  onchange="textvalidate(this.id,'wallalert');" onfocus="textvalidate(this.id,'wallalert');" required="required">
                                                                                    <option value="">Choose</option>
                                                                                    <option value="1">Pucca</option>
                                                                                    <option value="2">Pucca but broken</option>
                                                                                    <option value="3">Barbed wire fencing</option>
                                                                                    <option value="4">Hedges</option>
                                                                                    <option value="5">Under Construction</option>
                                                                                    <option value="6">No boundry wall</option>
                                                                                </select>
                                                                                 <font id="wallalert" style="color:#dd4b39;"></font>
                                                                            </div>
                                                                        </div>
                                                                    
                                                                    </div>
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-4">Perimeter of boundary (in meters) <font style="color:#dd4b39;">*</font></label>
                                                                            <div class="col-md-8">
                                                                                <input type="text" class="form-control" id="peri_bound" name="peri_bound" maxlength="7" onchange="textvalidate(this.id,'perboundalert');" onfocus="textvalidate(this.id,'perboundalert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required"/>
                                                                                <font id="perboundalert" style="color:#dd4b39;"></font>
                                                                            </div>
                                                                        </div>
                                                                    
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-4">Length of the boundary wall constructed (in meters) <font style="color:#dd4b39;">*</font></label>
                                                                            <div class="col-md-8">
                                                                                <input type="text" class="form-control" id="land_bound" name="land_bound" maxlength="7" onchange="textvalidate(this.id,'lenbound_alert');" onfocus="textvalidate(this.id,'lenbound_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required"/>
                                                                                <font id="lenbound_alert" style="color:#dd4b39;"></font>
                                                                            </div>
                                                                        </div>
                                                                    
                                                                    </div>
                                                                    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-4">Total no of Buildings / Blocks <font style="color:#dd4b39;">*</font></label>
                                                                            <div class="col-md-8">
                                                                                <input type="text" class="form-control" id="total_block"  name="total_block" onfocus="textvalidate(this.id,'totblkalert');" onchange="blockgenerate(this);textvalidate(this.id,'totblkalert');" onblur="if(!restlength(this)){setMinandMax(this,'block_1');}blockgenerate(this);" min="1" max="20" maxlength="2" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required"/>
                                                                                <font id="totblkalert" style="color:#dd4b39;"></font>
                                                                            </div>
                                                                        </div>
                                                                    
                                                                    </div>
                                                                </div>
                                                                        <input type="hidden" id="hiddennoc_0" name="hiddennoc_0" value="schoolnew_natureofconst_entry"/>
                                                                        <div id="blockcreate"></div>
                                                                        <div class="row-form-group" id="block_1" style="display:none;">
                                                                            <table class="table">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td colspan="13" class="bg-info"><b>BLOCK</b></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Nature of Construction<font style="color:#dd4b39;">*</font></td>
                                                                                        <td>Total no of floors (including ground floor)<font style="color:#dd4b39;">*</font></td>
                                                                                        <td colspan="2">Total no of class room<font style="color:#dd4b39;">*</font></td>
                                                                                        <td>Office room<font style="color:#dd4b39;">*</font></td>
                                                                                        <td>Lab room<font style="color:#dd4b39;">*</font></td>
                                                                                        <td>Library room <font style="color:#dd4b39;">*</font></td>
                                                                                        <td>Computer room <font style="color:#dd4b39;">*</font></td>
                                                                                        <td>Arts/Craft room <font style="color:#dd4b39;">*</font></td>
                                                                                        <td>Staff room<font style="color:#dd4b39;">*</font></td>
                                                                                        <td>HM/AHM/Vice Principal room <font style="color:#dd4b39;">*</font></td>
                                                                                        <td>Separate room for Girls <font style="color:#dd4b39;">*</font></td>
                                                                                        <td>Total no of rooms<font style="color:#dd4b39;">*</font></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td>Inuse</td>
                                                                                        <td>Notuse</td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <select class="form-control" id="noc" name="noc" onchange="textvalidate(this.id,'nocalert')" onfocus="textvalidate(this.id,'nocalert')">
                                                                                                <option value="">Choose</option>
                                                                                                <option value="1">Pucca</option>
                                                                                                <option value="2">Partially Pucca</option>
                                                                                                <option value="3">Kutcha</option>
                                                                                                <option value="4">Dilapidated buiding</option>
                                                                                                <option value="5">Building under construction</option>
                                                                                            </select>
                                                                                            <font style="color:#dd4b39;" id="nocalert"></font>
                                                                                        </td>
                                                                                        <td>
                                                                                            <input type="text" class="form-control" id="totfloor" name="totfloor" maxlength="2"  min="0" max="10" onchange="textvalidate(this.id,'totflooralert');" onfocus="textvalidate(this.id,'totflooralert');" onkeydown="return restlength(this);" onblur="return restlength(this);"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" />
                                                                                            <font style="color:#dd4b39;" id="totflooralert"></font>
                                                                                        </td>
                                                                                        <td>
                                                                                            <input type="text" class="form-control" id="totclassinuse" name="totclassinuse" onkeyup="sum('totroom');" onchange="sumofall(this.parentNode.parentNode,2);textvalidate(this.id,'totclasinusealert');" onfocus="textvalidate(this.id,'totclasinusealert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  />
                                                                                            <font style="color:#dd4b39;" id="totclasinusealert"></font>
                                                                                        </td>
                                                                                        <td>
                                                                                            <input type="text" class="form-control" id="totclassnotuse" name="totclassnotuse" onkeyup="sum('totroom');" onchange="sumofall(this.parentNode.parentNode,2);textvalidate(this.id,'totclassnotusealert');" onfocus="textvalidate(this.id,'totclassnotusealert')" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  />
                                                                                            <font style="color:#dd4b39;" id="totclassnotusealert"></font>
                                                                                        </td>
                                                                                        <td>
                                                                                            <input type="text" class="form-control" id="offroom" name="offroom" onkeyup="sum('totroom');" onchange="sumofall(this.parentNode.parentNode,2);textvalidate(this.id,'offroomalert');" onfocus="textvalidate(this.id,'offroomalert')" onkeypress="return event.charCode >= 48 && event.charCode <= 57" />
                                                                                            <font style="color:#dd4b39;" id="offroomalert"></font>
                                                                                        </td>
                                                                                        <td>
                                                                                            <input type="text" class="form-control" id="labroom" name="labroom" onkeyup="sum('totroom');" onchange="sumofall(this.parentNode.parentNode,2);textvalidate(this.id,'labroomalert');" onfocus="textvalidate(this.id,'labroomalert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" />
                                                                                            <font style="color:#dd4b39;" id="labroomalert"></font>
                                                                                        </td>
                                                                                        <td>
                                                                                            <input type="text" class="form-control" id="libroom" name="libroom" onkeyup="sum('totroom');" onchange="sumofall(this.parentNode.parentNode,2);textvalidate(this.id,'libroomalert');" onfocus="textvalidate(this.id,'libroomalert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" />
                                                                                            <font style="color:#dd4b39;" id="libroomalert"></font>
                                                                                        </td>
                                                                                        <td>
                                                                                            <input type="text" class="form-control" id="comroom" name="comroom" onkeyup="sum('totroom');" onchange="sumofall(this.parentNode.parentNode,2);textvalidate(this.id,'comroomalert');" onfocus="textvalidate(this.id,'comroomalert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" />
                                                                                            <font style="color:#dd4b39;" id="comroomalert"></font>
                                                                                        </td>
                                                                                        <td>
                                                                                            <input type="text" class="form-control" id="artroom" name="artroom" onkeyup="sum('totroom');" onchange="sumofall(this.parentNode.parentNode,2);textvalidate(this.id,'artroomalert');" onfocus="textvalidate(this.id,'artroomalert')" onkeypress="return event.charCode >= 48 && event.charCode <= 57" />
                                                                                            <font style="color:#dd4b39;" id="artroomalert"></font>
                                                                                        </td>
                                                                                        <td>
                                                                                            <input type="text" class="form-control" id="staffroom" name="staffroom" onkeyup="sum('totroom');" onchange="sumofall(this.parentNode.parentNode,2);textvalidate(this.id,'staffroomalert');" onfocus="textvalidate(this.id,'staffroomalert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" />
                                                                                            <font style="color:#dd4b39;" id="staffroomalert"></font>
                                                                                        </td>
                                                                                        <td>
                                                                                            <input type="text" class="form-control" id="hmroom" name="hmroom" onkeyup="sum('totroom');" onchange="sumofall(this.parentNode.parentNode,2);textvalidate(this.id,'hmroomalert');" onfocus="textvalidate(this.id,'hmroomalert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" />
                                                                                            <font style="color:#dd4b39;" id="hmroomalert"></font>
                                                                                        </td>
                                                                                        <td>
                                                                                            <input type="text" class="form-control" id="sepgirlroom" name="sepgirlroom" onchange="sumofall(this.parentNode.parentNode,2);textvalidate(this.id,'sepgirlroomalert');" onfocus="textvalidate(this.id,'sepgirlroomalert');" onkeyup="sum('totroom');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" />
                                                                                            <font style="color:#dd4b39;" id="sepgirlroomalert"></font>
                                                                                        </td>
                                                                                        <td>
                                                                                            <input type="text" class="form-control" id="totroom" name="totroom" onchange="sumofall(this.parentNode.parentNode,2);textvalidate(this.id,'totroomalert');" onfocus="textvalidate(this.id,'totroomalert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" readonly="readonly" />
                                                                                            <font style="color:#dd4b39;" id="totroomalert"></font>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        
                                                                    
                                                                    <table class="table">
                                                                    <tr>
                                                                        <td class="bg-info"><b><i class="fa fa-building"></i> School Classroom Details</b>
                                                                        <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                                                                        </td>
                                                                    
                                                                    </tr>
                                                                
                                                                    </table>
                                                                    
                                                                     <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-5">Classrooms under construction <font style="color:#dd4b39;">*</font></label>
                                                                            <div class="col-md-7">
                                                                                <input type="text" class="form-control" id="class_und_con" name="class_und_con" maxlength="3" onchange="textvalidate(this.id,'clasundconalert');" onfocus="textvalidate(this.id,'clasundconalert')" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required"/>
                                                                                <font style="color:#dd4b39;" id="clasundconalert"></font>
                                                                            </div>
                                                                        </div>
                                                                    
                                                                    </div>
                                                                    
                                                                    
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-9" style="text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;Do all the classrooms have desk / table for students? <font style="color:#dd4b39;">*</font></label>
                                                                            <div class="col-md-3">
                                                                                <label>YES</label>&nbsp;<input type="radio" value="1" id="desk" name="desk" checked="checked"/>
                                                                                <label>NO</label>&nbsp;<input type="radio"  value="0" id="desk1" name="desk"/>
                                                                            </div>
                                                                        </div>
                                                                    
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-9">Whether there is a ramp for differently abled children to access classrooms? <font style="color:#dd4b39;">*</font></label>
                                                                            <div class="col-md-3">
                                                                                <label>YES</label>&nbsp;<input type="radio" value="1" id="ramp" name="ramp" onchange="sbcshow2(this,'handrailsdetails');" />
                                                                                <label>NO</label>&nbsp;<input type="radio" value="0" id="ramp1" name="ramp" onchange="sbcshow2(this,'handrailsdetails');" checked="checked"/>
                                                                            </div>
                                                                        </div>
                                                                    
                                                                    </div>
                                                                    
                                                                    <div class="col-md-6 handrailsdetails">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-8">Whether hand-rails for ramp available? <font style="color:#dd4b39;">*</font></label>
                                                                            <div class="col-md-4">
                                                                                <label>YES</label>&nbsp;<input type="radio" value="1" id="handrails" name="handrails"/>
                                                                                <label>NO</label>&nbsp;<input type="radio"  value="0" id="handrails1" name="handrails" checked="checked"/>
                                                                            </div>
                                                                        </div>
                                                                    
                                                                    </div>
                                                                    
                                                                </div>
                                                               
                                                                <input type="hidden" id="hiddenoac_0" name="hiddenoac_0" value="schoolnew_classroomlevel_entry"/>
                                                                <table class="table">
                                                                    <tbody>
                                                                         <tr>
                                                                            <td>Out of the available classrooms, details by stage / level <font style="color:#dd4b39;">*</font></td>
                                                                            <td>How many rooms <font style="color:#dd4b39;">*</font></td>
                                                                            <td>Add (+)   Delete(-)</td>
                                                                         </tr>
                                                                          <tr>
                                                                              <td>
                                                                                <select class="form-control" id="oac_0" name="oac_0"  onchange="textvalidate(this.id,'oacalert');selectionValidation(this,this.parentNode.parentNode,1);" onfocus="textvalidate(this.id,'oacalert');" >
                                                                                    <option value="">Chooose</option>
                                                                                    <option value="1">Pre Primary</option>
                                                                                    <option value="2">Primary</option>
                                                                                    <option value="3">Upper Primary</option>
                                                                                    <option value="4">Secondary</option>
                                                                                    <option value="5">Higher Secondary</option> 
                                                                                </select>
                                                                                 <font style="color:#dd4b39;" id="oacalert"></font>
                                                                              </td>
                                                                              <td>
                                                                                <input type="text" class="form-control" id="oacroom_0" name="oacroom_0" maxlength="3" onchange="textvalidate(this.id,'oacroomalert');" onfocus="textvalidate(this.id,'oacroomalert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required"/>
                                                                                <font style="color:#dd4b39;" id="oacroomalert"></font>
                                                                              </td>
                                                                              <td>
                                                                                <button type="button" class="btn" id="btnoac_0" onclick="callTwoFunctions(this.parentNode.parentNode,1);"><i class="fa fa-plus"></i></button>
                                                                                <button type="button" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,0);"><i class="fa fa-minus"></i></button>
                                                                              </td>
                                                                          </tr>
                                                                    </tbody>
                                                                </table>
                                                                
                                                                 <table class="table">
                                                                    <tr>
                                                                        <td class="bg-info"><b><i class="fa fa-gear"></i> School Other room Details</b>
                                                                        <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                                                                        </td>
                                                                    
                                                                    </tr>
                                                                
                                                                </table>
                                                                <input type="hidden" id="hiddenlbrc_0" name="hiddenlbrc_0" value="schoolnew_library_entry"/>
                                                                <table class="table">
                                                                    <tbody>
                                                                         <tr>
                                                                              <td>Whether the School has Library facility/Book Bank/ Reading Corner? <font style="color:#dd4b39;">*</font></td>
                                                                               <td>Total number of books <font style="color:#dd4b39;">*</font></td>
                                                                               <td>Add (+)   Delete(-)</td>
                                                                          </tr>
                                                                          <tr>
                                                                              <td>
                                                                                <select class="form-control" id="librarybook_0" name="librarybook_0" onchange="textvalidate(this.id,'libralert');selectionValidation(this,this.parentNode.parentNode);" onfocus="textvalidate(this.id,'libralert');" >
                                                                                    <option value="">Choose</option>
                                                                                    <option value="1">Library</option>
                                                                                    <option value="2">Book Bank</option>
                                                                                    <option value="3">Reading Corner</option>
                                                                                    <option value="4">Newspapers/Magazines</option>
                                                                                    <option value="5">None</option>
                                                                                </select>
                                                                                <font style="color:#dd4b39;" id="libralert"></font>
                                                                              </td>
                                                                              <td>
                                                                                <input type="text" class="form-control" id="nobooks_0" name="nobooks_0" onchange="textvalidate(this.id,'libbookalert');" onfocus="textvalidate(this.id,'libbookalert');" maxlength="7" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required"/>
                                                                                <font style="color:#dd4b39;" id="libbookalert"></font>
                                                                              </td>
                                                                              <td>
                                                                                <button type="button" class="btn" id="btnlibrarybook_0" onclick="callTwoFunctions(this.parentNode.parentNode,1);"><i class="fa fa-plus"></i></button>
                                                                                <button type="button" class="btn" onclick="callTwoFunctions(this.parentNode.parentNode,0);"><i class="fa fa-minus"></i></button>
                                                                              </td>
                                                                          </tr>
                                                                    </tbody>
                                                                </table>
                                                                
                                                                    
                                                                <div class="row">
                                                                     <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-9">Staff quarters (including Residential Quarters for Head Master/Principal and Others) <font style="color:#dd4b39;">*</font></label>
                                                                            <div class="col-md-3">
                                                                                <label>YES</label>&nbsp;<input type="radio" value="1" id="staffquater" name="staffquater" onchange="sbcshow2(this,'quaterdetails');setRequiredField(this.value,'quater_room','1');" />
                                                                                <label>NO</label>&nbsp;<input type="radio" value="0" id="staffquater1" name="staffquater" onchange="sbcshow2(this,'quaterdetails');setRequiredField(this.value,'quater_room','1');" checked="checked"/>
                                                                            </div>
                                                                        </div>
                                                                    
                                                                    </div>
                                                                    <div class="col-md-6 quaterdetails">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-4">How many rooms <font style="color:#dd4b39;">*</font></label>
                                                                            <div class="col-md-8">
                                                                                <input type="text" class="form-control" id="quater_room" name="quater_room" maxlength="2" onkeypress="return event.charCode >= 48 && event.charCode <= 57"/>
                                                                            </div>
                                                                        </div>
                                                                    
                                                                    </div>
                                                              </div>
                                                              
                                                              <table class="table">
                                                                    <tr>
                                                                        <td class="bg-info"><b><i class="fa fa-smile-o"></i> Staff Toilet Details</b>
                                                                        <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                                                                        </td>
                                                                    
                                                                    </tr>
                                                                
                                                              </table>
                                                              
                                                               <table class="table">
                                                                    <tbody>
                                                                         <tr>
                                                                              <td>Details of Toilets and Urinals for Staff <font style="color:#dd4b39;">*</font></td>
                                                                              <td>Gents <font style="color:#dd4b39;">*</font></td>
                                                                              <td>Ladies <font style="color:#dd4b39;">*</font></td>
                                                                          </tr>
                                                                          <tr>
                                                                            <td>Total number of Toilets available <font style="color:#dd4b39;">*</font></td>
                                                                            <td>
                                                                                <input type="text" class="form-control" id="gent_toil_staff" maxlength="3" name="gent_toil_staff" onchange="textvalidate(this.id,'gent_toil_staffalert');" onfocus="textvalidate(this.id,'gent_toil_staffalert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required"/>
                                                                                <font style="color:#dd4b39;" id="gent_toil_staffalert"></font>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control" id="ladie_toil_staff" maxlength="3" name="ladie_toil_staff" onchange="textvalidate(this.id,'ladie_toil_staffalert');" onfocus="textvalidate(this.id,'ladie_toil_staffalert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required"/>
                                                                                <font style="color:#dd4b39;" id="ladie_toil_staffalert"></font>
                                                                            </td>
                                                                          </tr>
                                                                          <tr>
                                                                            <td>Total number of Urinals available <font style="color:#dd4b39;">*</font></td>
                                                                            <td>
                                                                                <input type="text" class="form-control" id="gent_uri_staff" name="gent_uri_staff" maxlength="3" onchange="textvalidate(this.id,'gent_uri_staffalert');" onfocus="textvalidate(this.id,'gent_uri_staffalert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required"/>
                                                                                <font style="color:#dd4b39;" id="gent_uri_staffalert"></font>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control" id="ladie_uri_staff" name="ladie_uri_staff" maxlength="3" onchange="textvalidate(this.id,'ladie_uri_staffalert');" onfocus="textvalidate(this.id,'ladie_uri_staffalert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required"/>
                                                                                <font style="color:#dd4b39;" id="ladie_uri_staffalert"></font>
                                                                            </td>
                                                                          </tr>
                                                                     </tbody>
                                                                </table>
                                                               
                                                               <table class="table">
                                                                    <tr>
                                                                        <td class="bg-info"><b><i class="fa fa-smile-o"></i> Student Toilet Details</b>
                                                                        <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                                                                        </td>
                                                                    
                                                                    </tr>
                                                                
                                                              </table>
                                                               <table class="table">
                                                                    <tbody>
                                                                         <tr>
                                                                            <td>Details of Toilets and Urinals for Students <font style="color:#dd4b39;">*</font></td>
                                                                            <td></td>
                                                                            <td colspan="2" style="border-right: thin #ccc solid;">Boys Only <font style="color:#dd4b39;">*</font></td>
                                                                            <td></td>
                                                                            <td colspan="2">Girls Only <font style="color:#dd4b39;">*</font></td>
                                                                         </tr>
                                                                         <tr>
                                                                            <td></td>
                                                                            <td>In use <font style="color:#dd4b39;">*</font></td>
                                                                            <td>Not in use<font style="color:#dd4b39;">*</font></td>
                                                                            <td style="border-right: thin #ccc solid;">Reason for Not in use <font style="color:#dd4b39;">*</font></td>
                                                                            <td>In use <font style="color:#dd4b39;">*</font></td>
                                                                            <td>Not in use<font style="color:#dd4b39;">*</font></td>
                                                                            <td>Reason for Not in use <font style="color:#dd4b39;">*</font></td>
                                                                         </tr>
                                                                         <tr>
                                                                            <td>Total number of Toilets available (Definition of functional toilet: water available in the toilet, minimal odour, unbroken seat, regularly cleaned with working drainage system, accessible to users, closable door) <font style="color:#dd4b39;">*</font></td>
                                                                            <td>
                                                                                <input type="text" class="form-control" id="tot_inuse_boys" name="tot_inuse_boys" maxlength="3" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  onchange="textvalidate(this.id,'tot_inuse_boysalert');" onfocus="textvalidate(this.id,'tot_inuse_boysalert');" required="required"/>
                                                                                <font style="color:#dd4b39;" id="tot_inuse_boysalert"></font>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control" id="tot_notuse_boys" name="tot_notuse_boys" maxlength="3" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  onchange="textvalidate(this.id,'tot_notuse_boysalert');" onfocus="textvalidate(this.id,'tot_notuse_boysalert');" required="required"/>
                                                                                <font style="color:#dd4b39;" id="tot_notuse_boysalert"></font>
                                                                            </td>
                                                                            <td style="width: 150px;border-right: thin #ccc solid;">
                                                                                <select class="form-control" id="reason_notuse_boys" name="reason_notuse_boys"  onchange="textvalidate(this.id,'reason_notuse_boysalert');" onfocus="textvalidate(this.id,'reason_notuse_boysalert');" required="required"/>
                                                                                <option value="">Choose</option>
                                                                                <option value="1">Water Supply</option>
                                                                                <option value="2">Drainage Problem</option>
                                                                                <option value="3">Toilet Damaged</option>
                                                                                <option value="4">Not Applicable</option>
                                                                                </select>
                                                                                <font style="color:#dd4b39;" id="reason_notuse_boysalert"></font>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control" id="tot_inuse_girls" name="tot_inuse_girls" maxlength="3" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required"/>
                                                                                <font style="color:#dd4b39;" id="urinals_inuse_boysalert"></font>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control" id="tot_notuse_girls" name="tot_notuse_girls" maxlength="3" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required"/>
                                                                                <font style="color:#dd4b39;" id="urinals_inuse_boysalert"></font>
                                                                            </td>
                                                                            <td style="width: 150px;">
                                                                                <select class="form-control" id="reason_notuse_girls" name="reason_notuse_girls"  onchange="textvalidate(this.id,'ladie_uri_staffalert');" onfocus="textvalidate(this.id,'ladie_uri_staffalert');" required="required">
                                                                                <option value="">Choose</option>
                                                                                <option value="1">Water Supply</option>
                                                                                <option value="2">Drainage Problem</option>
                                                                                <option value="3">Toilet Damaged</option>
                                                                                <option value="4">Not Applicable</option>
                                                                                </select>
                                                                                <font style="color:#dd4b39;" id="urinals_inuse_boysalert"></font>
                                                                            </td>
                                                                         </tr>
                                                                         <tr>
                                                                            <td>Number of CWSN friendly functional toilets <font style="color:#dd4b39;">*</font></td>
                                                                            <td>
                                                                                <input type="text" class="form-control" id="cswn_inuse_boys" name="cswn_inuse_boys" maxlength="3" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  onchange="textvalidate(this.id,'ladie_uri_staffalert');" onfocus="textvalidate(this.id,'ladie_uri_staffalert');" required="required"/>
                                                                                <font style="color:#dd4b39;" id="urinals_inuse_boysalert"></font>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control" id="cswn_notuse_boys" name="cswn_notuse_boys" maxlength="3" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  onchange="textvalidate(this.id,'ladie_uri_staffalert');" onfocus="textvalidate(this.id,'ladie_uri_staffalert');" required="required"/>
                                                                                <font style="color:#dd4b39;" id="urinals_inuse_boysalert"></font>
                                                                            </td>
                                                                            <td style="width: 150px; border-right: thin #ccc solid;">
                                                                                <select class="form-control" id="cwsn_reasonnotuse_boys" name="cwsn_reasonnotuse_boys" required="required">
                                                                                <option value="">Choose</option>
                                                                                <option value="1">Water Supply</option>
                                                                                <option value="2">Drainage Problem</option>
                                                                                <option value="3">Toilet Damaged</option>
                                                                                <option value="4">Not Applicable</option>
                                                                                </select>
                                                                                <font style="color:#dd4b39;" id="urinals_inuse_boysalert"></font>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control" id="cwsn_inuse_girls" name="cwsn_inuse_girls" maxlength="3" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  onchange="textvalidate(this.id,'ladie_uri_staffalert');" onfocus="textvalidate(this.id,'ladie_uri_staffalert');" required="required"/>
                                                                                <font style="color:#dd4b39;" id="urinals_inuse_boysalert"></font>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control" id="cwsn_notuse_girls" name="cwsn_notuse_girls" maxlength="3" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  onchange="textvalidate(this.id,'cwsn_notuse_girlsalert');" onfocus="textvalidate(this.id,'cwsn_notuse_girlsalert');" required="required"/>
                                                                                <font style="color:#dd4b39;" id="cwsn_notuse_girlsalert"></font>
                                                                            </td>
                                                                            <td style="width: 150px;">
                                                                                <select class="form-control" id="cwsn_reasonnotuse_girls" name="cwsn_reasonnotuse_girls"  onchange="textvalidate(this.id,'cwsn_reasonnotuse_girlsalert');" onfocus="textvalidate(this.id,'cwsn_reasonnotuse_girlsalert');" required="required">
                                                                                <option value="">Choose</option>
                                                                                <option value="1">Water Supply</option>
                                                                                <option value="2">Drainage Problem</option>
                                                                                <option value="3">Toilet Damaged</option>
                                                                                <option value="4">Not Applicable</option>
                                                                                </select>
                                                                                <font style="color:#dd4b39;" id="cwsn_reasonnotuse_girlsalert"></font>
                                                                            </td>
                                                                         </tr>
                                                                         <tr>
                                                                            <td>Total number of Urinals available <font style="color:#dd4b39;">*</font></td>
                                                                            <td>
                                                                                <input type="text" class="form-control" id="urinals_inuse_boys" name="urinals_inuse_boys" maxlength="3" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  onchange="textvalidate(this.id,'urinals_inuse_boysalert');" onfocus="textvalidate(this.id,'urinals_inuse_boysalert');" required="required"/>
                                                                                <font style="color:#dd4b39;" id="urinals_inuse_boysalert"></font>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control" id="urinals_notuse_boys" name="urinals_notuse_boys" maxlength="3" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  onchange="textvalidate(this.id,'urinals_notuse_boysalert');" onfocus="textvalidate(this.id,'urinals_notuse_boysalert');" required="required"/>
                                                                                <font style="color:#dd4b39;" id="urinals_notuse_boysalert"></font>
                                                                            </td>
                                                                            <td style="width: 150px; border-right: thin #ccc solid;">
                                                                                <select class="form-control" id="urinal_reasonnotuse_boys" name="urinal_reasonnotuse_boys" onchange="textvalidate(this.id,'urinal_reasonnotuse_boysalert');" onfocus="textvalidate(this.id,'urinal_reasonnotuse_boysalert');" required="required">
                                                                                <option value="">Choose</option>
                                                                                <option value="1">Water Supply</option>
                                                                                <option value="2">Drainage Problem</option>
                                                                                <option value="3">Toilet Damaged</option>
                                                                                <option value="4">Not Applicable</option>
                                                                                </select>
                                                                                <font style="color:#dd4b39;" id="urinal_reasonnotuse_boysalert"></font>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control" id="urinals_inuse_girls" name="urinals_inuse_girls" maxlength="3" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  onchange="textvalidate(this.id,'urinals_inuse_girlsalert');" onfocus="textvalidate(this.id,'urinals_inuse_girlsalert');" required="required"/>
                                                                                <font style="color:#dd4b39;" id="urinals_inuse_girlsalert"></font>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control" id="urinals_notuse_girls" name="urinals_notuse_girls" maxlength="3" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  onchange="textvalidate(this.id,'urinals_notuse_girlsalert');" onfocus="textvalidate(this.id,'urinals_notuse_girlsalert');" required="required"/>
                                                                                <font style="color:#dd4b39;" id="urinals_notuse_girlsalert"></font>
                                                                            </td>
                                                                            <td style="width: 150px;">
                                                                                <select class="form-control" id="urinal_reasonnotuse_girls" name="urinal_reasonnotuse_girls" onchange="textvalidate(this.id,'urinal_reasonnotuse_girlsalert');" onfocus="textvalidate(this.id,'urinal_reasonnotuse_girlsalert');" required>
                                                                                <option value="">Choose</option>
                                                                                <option value="1">Water Supply</option>
                                                                                <option value="2">Drainage Problem</option>
                                                                                <option value="3">Toilet Damaged</option>
                                                                                <option value="4">Not Applicable</option>
                                                                                </select>
                                                                                <font style="color:#dd4b39;" id="urinal_reasonnotuse_girlsalert"></font>
                                                                            </td>
                                                                         </tr>
                                                                         <tr>
                                                                            <td>How many of the above Toilets have running water facility for flushing and cleaning? <font style="color:#dd4b39;">*</font></td>
                                                                            <td colspan="3" style="border-right: thin #ccc solid;">
                                                                                <input type="text" class="form-control" id="toi_flush_boys" name="toi_flush_boys" maxlength="3" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  onchange="textvalidate(this.id,'toi_flush_boysalert');" onfocus="textvalidate(this.id,'toi_flush_boysalert');" required="required"/>
                                                                                <font style="color:#dd4b39;" id="toi_flush_boysalert"></font>
                                                                            </td>
                                                                            <td colspan="3">
                                                                                <input type="text" class="form-control" id="toi_flush_girls" name="toi_flush_girls" maxlength="3" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  onchange="textvalidate(this.id,'toi_flush_girlsalert');" onfocus="textvalidate(this.id,'toi_flush_girlsalert');" required="required"/>
                                                                                <font style="color:#dd4b39;" id="toi_flush_girlsalert"></font>
                                                                            </td>
                                                                         </tr>
                                                                         <tr>
                                                                            <td>How many urinals have water facility? <font style="color:#dd4b39;">*</font></td>
                                                                                <td colspan="3" style="border-right: thin #ccc solid;">
                                                                                    <input type="text" class="form-control" id="urinal_faci_boys" name="urinal_faci_boys" maxlength="3" onkeypress="return event.charCode >= 48 && event.charCode <= 57"   onchange="textvalidate(this.id,'urinal_faci_boysalert');" onfocus="textvalidate(this.id,'urinal_faci_boysalert');" required="required"/>
                                                                                    <font style="color:#dd4b39;" id="urinal_faci_boysalert"></font>
                                                                                </td>
                                                                                <td colspan="3">
                                                                                    <input type="text" class="form-control" id="urinal_faci_girls" name="urinal_faci_girls" maxlength="3" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  onchange="textvalidate(this.id,'urinal_faci_girlsalert');" onfocus="textvalidate(this.id,'urinal_faci_girlsalert');" required="required"/>
                                                                                    <font style="color:#dd4b39;" id="urinal_faci_girlsalert"></font>
                                                                                </td>
                                                                         </tr>
                                                                    </tbody>
                                                               </table>
                                                            
                                                                <div class="row">
                                                                     <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-9" style="text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;Is a Sanitary Worker engaged to clean the Toilets? <font style="color:#dd4b39;">*</font></label>
                                                                            <div class="col-md-3">
                                                                                <label>YES</label>&nbsp;<input type="radio" value="1" id="sanitory" name="sanitory" />
                                                                                <label>NO</label>&nbsp;<input type="radio" value="0" id="sanitory1" name="sanitory" checked="checked"/>
                                                                            </div>
                                                                        </div>
                                                                    
                                                                    </div>
                                                                     </div>
                                                                    
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-9" style="text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;Is there Land available for construction of additional Toilets if required?  <font style="color:#dd4b39;">*</font></label>
                                                                            <div class="col-md-3">
                                                                                <label>YES</label>&nbsp;<input type="radio" value="1" id="additional_toilet" name="additional_toilet" onchange="sbcshow2(this,'add_toi_details');setRequiredField(this.value,'additional_sqft','1');" />
                                                                                <label>NO</label>&nbsp;<input type="radio" value="0" id="additional_toilet1" name="additional_toilet" onchange="sbcshow2(this,'add_toi_details');setRequiredField(this.value,'additional_sqft','1');" checked="checked"/>
                                                                            </div>
                                                                        </div>
                                                                    
                                                                        </div>
                                                                        
                                                                        <div class="col-md-2 add_toi_details" id="toildetails">
                                                                        <div class="form-group">
                                                                            
                                                                            <label class="control-label col-md-3">Area<font style="color:#dd4b39;">*</font></label>
                                                                            <div class="col-md-7">
                                                                                <input type="text" id="additional_sqft" name="additional_sqft" class="form-control" placeholder="(in Sq.Ft)" maxlength="7" onkeypress="return event.charCode >= 48 && event.charCode <= 57" />
                                                                               
                                                                            </div>
                                                                             <div class="col-md-1" style="text-indent: -1em;">
                                                                                 <label class="control-label col-md-0">Sq.Ft</label>
                                                                             </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                        
                                                                    </div>
                                                                    
                                                                   
                                                             
                                                              
                                                              
                                                              <div class="row">
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                         <label class="control-label">
                                                                             Whether the School has been provided with Incinerator? <font style="color:#dd4b39;">*</font>
                                                                         </label>
                                                                         <div class="text-center">
                                                                                <label>YES</label>&nbsp;<input type="radio" value="1" id="incen" name="incen" onchange="sbcshow2(this,'incindetails');setRequiredField(this.value,'func_choolas,nonfunc_choolas,func_auto,nonfunc_auto','1');" />
                                                                                <label>NO</label>&nbsp;<input type="radio"  value="0" id="incen1" name="incen" onchange="sbcshow2(this,'incindetails');setRequiredField(this.value,'func_choolas,nonfunc_choolas,func_auto,nonfunc_auto','1');" checked="checked"/>
                                                                         </div>
                                                                         
                                                                    </div>
                                                                 </div>
                                                                 <div class="col-md-9 incindetails">
                                                                    <div class="form-group col-md-3">
                                                                        <label class="control-label col-md-10">Functional Manual (Choolas)<font style="color:#dd4b39;">*</font></label>
                                                                         <div class="col-md-10">
                                                                            <input type="text" id="func_choolas" name="func_choolas" maxlength="3" class="form-control" placeholder="Functional Manual" onkeypress="return event.charCode >= 48 && event.charCode <= 57"/>
                                                                         </div>
                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <label class="control-label col-md-10">Non - Functional Manual (Choolas)<font style="color:#dd4b39;">*</font></label>
                                                                         <div class="col-md-10">
                                                                            <input type="text" id="nonfunc_choolas" name="nonfunc_choolas" maxlength="3" class="form-control" placeholder="Non Functional Manual" onkeypress="return event.charCode >= 48 && event.charCode <= 57" />
                                                                         </div>
                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <label class="control-label col-md-12">Functional Automatic (Electrical)<font style="color:#dd4b39;">*</font></label>
                                                                         <div class="col-md-12">
                                                                            <input type="text" id="func_auto" name="func_auto" class="form-control" maxlength="3" placeholder="Functional Automatic" onkeypress="return event.charCode >= 48 && event.charCode <= 57" />
                                                                         </div>
                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                          <label class="control-label col-md-12">Non - Functional Automatic (Electrical)<font style="color:#dd4b39;">*</font></label>
                                                                         <div class="col-md-12">
                                                                            <input type="text" id="nonfunc_auto" name="nonfunc_auto" class="form-control" maxlength="3" placeholder="Non Functional Automatic" onkeypress="return event.charCode >= 48 && event.charCode <= 57" />
                                                                         </div>
                                                                         
                                                                     </div> 
                                                                 </div>
                                                              </div>
                                                           
                                                            
                                                            
                                                           <table class="table">
                                                                    <tr>
                                                                        <td class="bg-info"><b><i class="fa fa-smile-o"></i> School Drinking Water and Hand Wash Facility Details</b>
                                                                        <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i> Click to Details</span>
                                                                        </td>
                                                                    
                                                                    </tr>
                                                                
                                                           </table>
                                                           
                                                           <div class="row">
                                                              <div class="col-md-4">
                                                                   <div class="form-group col-md-12">
                                                                        <label class="control-label">Handwash Station <font style="color:#dd4b39;">*</font></label>
                                                                    </div>
                                                               </div>
                                                                <div class="col-md-4">
                                                                   <div class="form-group col-md-12">
                                                                        <label class="control-label">Available <font style="color:#dd4b39;">*</font></label>
                                                                    </div>
                                                               </div>
                                                               <div class="col-md-4">
                                                                   <div class="form-group col-md-12">
                                                                        <label class="control-label">Functional <font style="color:#dd4b39;">*</font></label>
                                                                    </div>
                                                               </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                   <div class="form-group col-md-12">
                                                                        <label class="control-label">Total no of Handwash Tap in use <font style="color:#dd4b39;">*</font></label>
                                                                    </div>
                                                               </div>
                                                                <div class="col-md-4">
                                                                   <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="tot_tap_avail" name="tot_tap_avail" maxlength="3" onfocus="textvalidate(this.id,'tot_tap_availalert')" onchange="textvalidate(this.id,'tot_tap_availalert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required"/>
                                                                        <font style="color:#dd4b39;" id="tot_tap_availalert"></font>
                                                                    </div>
                                                               </div>
                                                               <div class="col-md-4">
                                                                   <div class="form-group col-md-12">
                                                                        <input type="text" class="form-control" id="tot_tap_func" name="tot_tap_func" maxlength="3" onchange="textvalidate(this.id,'tot_tap_funcalert');" onfocus="textvalidate(this.id,'tot_tap_funcalert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required="required"/>
                                                                        <font style="color:#dd4b39;" id="tot_tap_funcalert"></font>
                                                                    </div>
                                                               </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                     <div class="form-group col-md-12">
                                                                            <label class="control-label col-md-9">Whether the School is provided with Overhead tank ? <font style="color:#dd4b39;">*</font>&nbsp;&nbsp; &nbsp;&nbsp;</label>
                                                                            <div class="col-md-3">
                                                                                <label>&nbsp;YES</label>&nbsp;<input type="radio" value="1" id="schooltank" name="schooltank" />
                                                                                <label>NO</label>&nbsp;<input type="radio" value="0" id="schooltank1" name="schooltank" checked="checked"/>
                                                                            </div>
                                                                     </div>
                                                                </div>
                                                                 
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                     <div class="form-group col-md-12">
                                                                            <label class="control-label col-md-9">Whether water purifier is available in the School? <font style="color:#dd4b39;">*</font>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;</label>
                                                                                
                                                                            <div class="col-md-3">
                                                                                <label>YES</label>&nbsp;<input type="radio" value="1" id="waterpurifier" name="waterpurifier" />
                                                                                <label>NO</label>&nbsp;<input type="radio" value="0" id="waterpurifier1" name="waterpurifier" checked="checked"/>
                                                                            </div>
                                                                     </div>
                                                                </div>
                                                            </div>
                                                             <div class="row">
                                                                <div class="col-md-6">
                                                                     <div class="form-group">
                                                                            <label class="control-label col-md-9">Does the School have provision for Rain Water Harvesting? <font style="color:#dd4b39;">*</font>&nbsp;&nbsp;&nbsp;</label>
                                                                            <div class="col-md-3">
                                                                                <label>YES</label>&nbsp;<input type="radio" value="1" id="rainwater" name="rainwater" />
                                                                                <label>NO</label>&nbsp;<input type="radio"  value="0" id="rainwater1" name="rainwater" checked="checked"/>
                                                                            </div>
                                                                     </div>
                                                                </div>
                                                                 
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                     <div class="form-group">
                                                                            <label class="control-label col-md-9">Whether drinking water is available in School premises? <font style="color:#dd4b39;">*</font>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                                            <div class="col-md-3">
                                                                                <label>YES</label>&nbsp;<input type="radio" value="1" id="drinkingwater" name="drinkingwater" onchange="document.getElementById('drink_water').selectedIndex=0;sbcshow2(this,'drinkwaterdetails');selectshow(document.getElementById('drink_water'),'topwelldetails'); showOthersText(this.parentNode.parentNode,4,3);setRequiredField(this.value,'drink_water','1');" />
                                                                                <label>NO</label>&nbsp;<input type="radio"  value="0" id="drinkingwater1" name="drinkingwater" onchange="document.getElementById('drink_water').selectedIndex=0;sbcshow2(this,'drinkwaterdetails');selectshow(document.getElementById('drink_water'),'topwelldetails'); showOthersText(this.parentNode.parentNode,4,3);setRequiredField(this.value,'drink_water','1');" checked="checked"/>
                                                                            </div>
                                                                     </div>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="row drinkwaterdetails">
                                                                <div class="col-md-6">
                                                                     <div class="form-group">
                                                                        <label class="control-label col-md-9" style="text-align: center;">If Yes, source of drinking water<font style="color:#dd4b39;">*</font></label>
                                                                        <div class="col-md-3">
                                                                            <select class="form-control" id="drink_water" name="drink_water" onchange="selectshow(this,'topwell');textvalidate(this.id,'drink_alert');" onfocus="textvalidate(this.id,'drink_alert');">
                                                                                <option value="">Choose</option>
                                                                                <option value="1">Hand pumps</option>
                                                                                <option value="2">Well</option>
                                                                                <option value="3">Tap water</option>
                                                                                <option value="4">RO purifier</option>
                                                                                <option value="5">Packaged/Botteled</option>
                                                                                <option value="-1">Others</option>
                                                                            </select>
                                                                            <font style="color:#dd4b39;" id="drink_alert"></font>
                                                                        </div>
                                                                     </div>
                                                                </div>
                                                                
                                                                <div class="col-md-3 otherdetails" id="otherdetails">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <input type="text" class="form-control" id="other_drinkwater" name="other_drinkwater" placeholder="if,otherss"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                
                                                           
                                                            
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6 topwell" id="topwelldetails">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-9">Whether well is being maintained as top closed? <font style="color:#dd4b39;">*</font></label>
                                                                        <div class="col-md-3">
                                                                            <label>YES</label>&nbsp;<input type="radio" value="1" id="wellclose" name="wellclose"/>
                                                                            <label>NO</label>&nbsp;<input type="radio"  value="0" id="wellclose1" name="wellclose" checked="checked"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                           
                                                            
                                                            
                                                          
                                                         
                                                         
                                                         </div>
                                                        <div class="form-actions text-center" >
                                                            <button type="button" onclick="location.href='<?php echo base_url().'Newschool/new_school/3';?>'" class="btn btn-success">Previous</button>
												            <button type="submit" class="btn btn-primary">Save</button>
                                                            <button type="button" onclick="location.href='<?php echo base_url().'';?>'" class="btn default">Cancel</button>
                                                            <button type="button" onclick="location.href='<?php echo base_url().'Newschool/new_school/5';?>'" class="btn btn-success">Next</button>
                                                        </div>
                                                             
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
                                                    </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    
                     <?php $this->load->view('footer.php'); ?>
                     <?php $this->load->view('scripts.php'); ?>
                     <script src="<?php echo base_url().'asset/js/vivekrao/jsonpost.js';?>" type="text/javascript"></script>
</body> 

<script>
/*******************************************************************
Function done by Magesh 20-02-2019
********************************************************************/
     function textvalidate(id,alertid){
			//alert(alertid);	
			var text = document.getElementById(id);
			var alt = document.getElementById(alertid);
            if(alt!=null){
			if(text.value==''){
				alt.innerHTML="This field is required";
                text.value='';
                return true;
			}else {
				alt.innerHTML="";
			}
            }
    }
    
     function getalldetails(currentElement,targetElement,value,url,segment) {
        //alert("Current Element="+ currentElement +"TargetElement="+ targetElement +"Value="+ value +"url="+ url +"segment="+ segment);
     var management = currentElement.name;
      $.ajax({
            type: "POST",
            url:url+segment,
            data:"&"+management+"="+currentElement.value,
            success: function(resp){
               if($("#"+targetElement).attr('type')=='select'){
               }
               else{
                 $("#"+targetElement).html(resp);
                
               }  
               return true;   
            }
            });
     
    }
    
    
    document.getElementById('arrangedetails').style.visibility='hidden';
    document.getElementById('otherdetails').style.visibility='hidden';
    document.getElementById('topwelldetails').style.visibility='hidden';
    
    
    sbcshow2(document.getElementById('schoolfaci1'),'landexpan');
    sbcshow2(document.getElementById('playground'),'playgroundfaci');
    sbcshow2(document.getElementById('playground1'),'playgroundavaildetails');
    sbcshow2(document.getElementById('staffquater1'),'quaterdetails');
    sbcshow2(document.getElementById('additional_toilet1'),'add_toi_details');
    sbcshow2(document.getElementById('incen1'),'incindetails');
    sbcshow2(document.getElementById('drink_water'),'drinkwaterdetails');
    sbcshow2(document.getElementById('ramp1'),'handrailsdetails')
    landusage(0);
    
    function landusage(landvalue) {
        var ele = Array();
        var sh=hd='hidden';
        ele[0] = document.getElementsByClassName('rentdetails');
        ele[1] = document.getElementsByClassName('leasedetails');
       
        if(landvalue==1) {
            sh='';
            hd='hidden';
           
        }else if(landvalue==2){
            sh='hidden';
            hd='';
        }
        
        for(var i=0;i<ele.length;i++){
           //alert(ele.length);
          for(var j=0;j<ele[i].length;j++) {
            if(i==0){
                ele[i][j].style.visibility=sh;
            }else{
                ele[i][j].style.visibility=hd;
            }
         }
                
        }
        
    }
    
    function sbcshow2(sbc,classname) {
        var x = document.getElementsByClassName(classname);
        if(sbc.value == 0 || sbc.value == '') {
            for(var i=0;i<x.length;i++) {
                x[i].style.visibility='hidden';
                x[i].innerHTML=x[i].innerHTML;
            }
        } else {
            for(var i=0;i<x.length;i++) {
                x[i].style.visibility='';
            }
        }
    }
    
    function selectshow(sbc,classname) {
        var x = document.getElementsByClassName('topwell');
        var y = document.getElementsByClassName('otherdetails');
        if(sbc.value==2) {
            for(var i=0;i<x.length; i++) {
                x[i].style.visibility='';
            }
            
        }else if(sbc.value==-1){
            for (var j=0;j<y.length; j++) {
                y[j].style.visibility='';
            }
        }else{
            for(var i=0;i<x.length; i++) {
                x[i].style.visibility='hidden';
            }
            for (var j=0;j<y.length; j++) {
                y[j].style.visibility='hidden';
            }
        }
        
    }
    
    
    function blockgenerate(node){
    //alert(node);
        var ddd=document.getElementById('blockcreate');
        while (ddd.firstChild) {
         ddd.removeChild(ddd.firstChild);
        }
        for(var i=1;i<=parseInt(node.value);i++){
            var div=document.createElement('div');
            div.setAttribute('class','row-form-group');
            div.setAttribute('id','block_'+(i+2));
            div.innerHTML=document.getElementById('block_1').innerHTML;
            ddd.appendChild(div);
        }
         BlockIDNameChange();
    }

    function BlockIDNameChange(){
        var div=document.getElementById('blockcreate');
        //Inner Div Selection
        //alert(div.children.length);
        for(var inDiv=0;inDiv<div.children.length;inDiv++){
         var table=div.children[inDiv].children[0];
            for(var tb=0;tb<table.children.length;tb++){
                var tbody=table.children[tb];
                for(var tr=0;tr<tbody.children.length;tr++){
                    var row=tbody.children[tr];
                    for(var th=0;th<row.children.length;th++){
                     var thele=row.children[th];
                        if(thele.hasAttribute('class')){
                         thele.children[0].innerHTML='BLOCK - '+(inDiv+1);
                         continue;
                        }
                        for(var ele=0;ele<thele.children.length;ele++){
                            var element=thele.children[ele];
                            if(checkInstanceof(element)){
                                element.id=element.id.split('_')[0]+'_'+inDiv;
                                element.name=element.id.split('_')[0]+'_'+inDiv;
                            }
                        }
                    }
                }
            }
        } 
    }
    
    
    function sum() {
            
             var c1 = document.getElementById('totclassinuse').value==''?0:document.getElementById('totclassinuse').value;
             var c2 = document.getElementById('totclassnotuse').value==''?0:document.getElementById('totclassnotuse').value;
             var c3 = document.getElementById('offroom').value==''?0:document.getElementById('offroom').value;
             var c4 = document.getElementById('labroom').value==''?0:document.getElementById('labroom').value;
             var c5 = document.getElementById('libroom').value==''?0:document.getElementById('libroom').value;
             var c6 = document.getElementById('comroom').value==''?0:document.getElementById('comroom').value;
             var c7 = document.getElementById('artroom').value==''?0:document.getElementById('artroom').value;
             var c8 = document.getElementById('staffroom').value==''?0:document.getElementById('staffroom').value;
             var c9 = document.getElementById('hmroom').value==''?0:document.getElementById('hmroom').value;
             var c10 = document.getElementById('sepgirlroom').value==''?0:document.getElementById('sepgirlroom').value;
             var result = parseInt(c1) + parseInt(c2) + parseInt(c3) + parseInt(c4) + parseInt(c5) + parseInt(c6) + parseInt(c7) + parseInt(c8) + parseInt(c9) + parseInt(c10);
             document.getElementById('totroom').value = result;
    }
    
   
    function restlength(node) {
		      //alert(node.id);
            if(node.value.length==node.getAttribute('maxlength') && event.keyCode!=8) {
                if(parseInt(node.value) < parseInt(node.getAttribute('min')) && node.hasAttribute('min')) {
                    node.value=node.getAttribute('min');
                }
                else if(parseInt(node.value) > parseInt(node.getAttribute('max')) && node.hasAttribute('max')) {
                    node.value=node.getAttribute('max');
                }  
                return false;
            }
            if(!(document.activeElement.id==node.id)){
                //alert('asdf');
                if(parseInt(node.value) < parseInt(node.getAttribute('min')) && node.hasAttribute('min')) {
                    node.value=node.getAttribute('min');
                }
                else if(parseInt(node.value) > parseInt(node.getAttribute('max')) && node.hasAttribute('max')) {
                    node.value=node.getAttribute('max');
                }  
                return false;
            }
            return true;
    }
    
    
    function setMinandMax(node,nodeID,base=1947,majcond='min'){
    //alert(nodeID);
        var setNode=document.getElementById(nodeID);
        var setvalue=node.value;
        if(node.value < setNode.getAttribute('min')){
            if(node.value < base){
             setvalue=base;
            }
         }
        setNode.setAttribute(majcond,setvalue); 
            setNode.value='';   
            return true;
     }
       
    function sqfttoacre(node){
        var id=node.id.split("_");
        if(id[1]==undefined){
         document.getElementById(id[0]+'_1').value=(parseFloat(node.value)/43560).toFixed(3);
        }else{
            
            document.getElementById(id[0]).value= parseFloat(node.value) * 43560;
            
        }
    }

    function sumofall(node,sel=1){
        var sum=0,val=0;
        for(var i=sel;i<node.children.length-1;i++){
            for(var j=0;j<node.children[i].children.length;j++){
                if(checkInstanceof(node.children[i].children[j])){
                    val=0;
                    if(node.children[i].children[j].value!=''){
                     val=parseInt(node.children[i].children[j].value);    
                    }
                }
            }
            sum+=val;
        }
    	//alert(node);
        node.lastElementChild.children[0].value=sum;
    } 
    
   
    function callTwoFunctions(node,check){
            if(check==1){
                if(createRow(node))
                    showOthersText(node);
            }
            else{
                if(deleteRow(node))
                    showOthersText(node);
            }
    }
    
    function createRow(node){
            if(onScriptAddRowValidation(node)){
                var nodeInner=node.innerHTML;
                var tr=document.createElement('tr');
                tr.innerHTML=nodeInner;
                changeIdandName(node.parentNode);
                node.parentNode.appendChild(tr);
                return changeIdandName(node.parentNode);
            }
            else{
                alert('All Values Are Required!');
            }
    }
    
    function onScriptAddRowValidation(node){
    var ret=true,opt='';
    //alert(node.children.length);
    if(node.nextElementSibling!=null)
        return false;
    for(var i=0;i<node.children.length-1;i++){
        if(node.children[i].children[0] instanceof HTMLDivElement)
            opt=NodeDeepChildren(node.children[i].children[0]);
        else{
            opt=NodeDeepChildren(node.children[i]);
        }
        if(!opt)
            ret=opt;
    }
    if(ret)
        return true;
    else
        return false;
    }
    
    function NodeDeepChildren(node){
        //alert(node);
    var ret=true;
    for(var i=0;i<node.children.length;i++){
       // alert(node.children[i].id+'===='+checkInstanceof(node.children[i]) +' && '+ node.children[i].hasAttribute("required"));
        if(checkInstanceof(node.children[i]) && node.children[i].hasAttribute("required")){
            var st=window.getComputedStyle(node.children[i]);
            if(st.visibility!='hidden'){
                if(node.children[i].value=='' || node.children[i].value=='00:00' || node.children[i].value==0){
                    ret=false;
                }    
            }
        }
    }
    //alert(ret);
    return ret;
    }
    
    function checkInstanceof(element){
            if(element instanceof HTMLSelectElement)
                return true;
            else if(element instanceof HTMLInputElement)
                return true;
            else if(element instanceof HTMLButtonElement)
                return true;
            else if(element instanceof HTMLFormElement)
                return true;
            else if(element instanceof HTMLTextAreaElement)
                return true;
            else
                return false;
    }
    
    
    function deleteRow(node){
            var par=node.parentNode;
            //alert(par.children.length);
            //alert(par);
            if(par.children[0].children[0].hasAttribute('colspan') && !checkInstanceof(par.children[1].children[0].children[0])){
                if(par.children.length > 3)
                    par.removeChild(node);
                else
                    alert('!!!!!!!!!!!!!!!!Atlease 1 Should Be Entered');
            }else{
                //alert(par.children[1].children[0].children[0]);
                if(par.children.length >= 2){
                    if(checkInstanceof(par.children[1].children[0].children[0])){
                        if(par.children.length > 2)
                            par.removeChild(node);
                        else
                            alert('Atlease 1 Should Be Entered');
                    }
                     else{
                        if(par.children.length > 1)
                            par.removeChild(node);
                        else
                            alert('Atlease 1 Should Be Entered``');
                    }
                }
                else{
                    if(par.children.length > 1)
                        par.removeChild(node);
                    else
                        alert('Atlease 1 Should Be Entered!!!!!!!!!!!!');
                }
                
            }
            return changeIdandName(par);
        }
        
        function changeIdandName(node){
            //alert(node);
            var tRowCount=0,z=0,checkbit=0;
            for(var tr=0;tr<node.children.length;tr++){
                var trChild=node.children[tr];
                for(var th=0;th<trChild.children.length;th++){
                    var inputElement=trChild.children[th];
                    inputElement.hasAttribute('id')?(inputElement.id=inputElement.id.split('_')[0]+'_'+tRowCount):'';
                    for(var input=0;input<inputElement.children.length;input++){
                        if(checkInstanceof(inputElement.children[input])){
                            var inputid=inputElement.children[input].id;
                            var id=inputid.split('_');
                            if(inputElement.children[input].getAttribute('type')=='radio'){
                                if(z==0){
                                    inputElement.children[input].id=id[0]+'_'+(tRowCount);
                                    inputElement.children[input].name=id[0]+'_'+(tRowCount);
                                    z=tRowCount;
                                }
                                else{
                                    inputElement.children[input].id=id[0]+'_'+(z+1);
                                    inputElement.children[input].name=id[0]+'_'+(tRowCount);
                                    z=0;
                                }
                                //alert(inputElement.children[input].checked);
                            }
                            else{
                                inputElement.children[input].id=id[0]+'_'+(tRowCount);
                                inputElement.children[input].name=id[0]+'_'+(tRowCount); 
                                //alert(inputElement.children[input].id);  
                            }
                            checkbit=1;
                        }
                        else if(inputElement.children[input] instanceof HTMLDivElement){
                            nodeDeepChildren(inputElement.children[input],tRowCount);
                        }
                    }
                }
                tRowCount=checkbit!=0?(tRowCount=tRowCount+1):tRowCount;
                checkbit=0;
            }
            return true;
        }
    
    
    
    
    
    function showOthersText(node,sel=1,val=0){
            //alert(node.children[sel].id);
            if(node.children[sel].hasAttribute('id')){
                var id=node.children[sel].id.split('_');
                if(node.children[val].children[0].value==-1 || node.children[val].children[0].value==15){
                    if(node.children[val].children[0].options[node.children[val].children[0].selectedIndex].innerHTML=='NGO' && node.children[val].children[0].value==15)
                        document.getElementById(id[0]+'_'+id[1]).style.visibility='';
                    else if(node.children[val].children[0].value==-1)
                        document.getElementById(id[0]+'_'+id[1]).style.visibility='';
                }
                else{
                    document.getElementById(id[0]+'_'+id[1]).style.visibility='hidden';
                }
            }
			/*else{
				alert('hi');
				}*/
    }
    
    
    function popup(node){
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
            },function(isConfirm){
                if(isConfirm){
                    //swal("OK", "SCHOOL LAND DETAILS - II Saved Successfully", "success");
                    node.submit();
                }else{
                    swal("Cancelled", "Your cancelled the profile1", "error");
                    return false;
                }
            });	
    }
    
    function setRequiredField(baseValue,enableids,whichValue){
        //alert('Set Required'+'==='+baseValue+'  '+enableids+'  '+whichValue);
        var wValue=whichValue.split(",");
        var ids=enableids.split(",");
        var i,id,checkbit=0;
        for(i in wValue){
            //alert(wValue[i]);
            if(baseValue==wValue[i]){
                //alert(Array.isArray(ids));
                for(id in ids){
                    if(document.getElementById(ids[id])!=null)
                        document.getElementById(ids[id]).setAttribute('required','required');
                }
                checkbit=1;
            }
        }
        
        if(checkbit==0){
            for(id in ids){
                if(document.getElementById(ids[id])){
                    document.getElementById(ids[id]).removeAttribute('required');
                    document.getElementById(ids[id]).value='';
                }
            }
        }
    }
    
    function selectionValidation(node,prNode,sel=0,fnd=0){
            //alert('Validation'+node.value+' '+prNode);
            var selectedValue=node.value;
            var prNnode=prNode.parentNode;
            for(var i=fnd;i<prNnode.children.length;i++){
				if(checkInstanceof(prNnode.children[i].children[sel].children[0])){
					if(selectedValue==prNnode.children[i].children[sel].children[0].value){
						if(node.id!=prNnode.children[i].children[sel].children[0].id){
							alert('Already Selected');
							deleteRow(prNode);
						}
					}
				}
			}
        }

/*******************************************************************
        Function ended
********************************************************************/

</script>
</html>
