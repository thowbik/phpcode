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


        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            


<?php $userlogin=$this->session->userdata('emis_user_type_id'); 	?>            
<?php if($this->session->userdata('emis_user_type_id') == 3 ) 	
{?>
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
                                       
                                    <?php $this->load->view('emis_school_profile_header1.php'); ?>
                                        

                                           <!-- <div class="m-heading-1 border-green m-bordered">
                                            <h3>Basic Information</h3>
                                        </div> -->
                                     
                                         
                                        <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">School Details</span>
                                                </div>
                                            </div> 
                                            <div class="portlet-body">
                                               <div class ="row">
                                                    <div class="col-md-4">
                                                        <font style="color:#dd4b39;">
                                                            <?php echo $this->session->flashdata('errors'); ?>
                                                        </font>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--begin form -->
                                           

                                            <div class="portlet-body">
                                              <div class="row">
                                                    <div class="col-md-12">
                                                          
                                        									  
                                        <center>
                                                  
												   
                                                    <div class="form-group">
                                                    <div class="row">
                                                      
													<div class="col-md-12">
													
                                                        
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  
 
  background-color:lightblue;
}


td{text-align: center}
th{text-align: center}

/* Style the buttons inside the tab */
.tab button {
  background-color:#3d7035;
  float: left;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 14px;
  text-color:white;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color:#0b0954 ;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color:#0b0954;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  
  border-top: none;
}
</style>                                                      
  
<div class="tab">
  <!--<button style="padding-left:50px; color:white;" class="tablinks" onclick="openCity(event, 'London')">&nbsp;&nbsp;&nbsp;&nbsp;ஆசிரியர்களின் எண்ணிக்கை&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </button>
  <button style="color:white;"  class="tablinks" onclick="openCity(event, 'Paris')">&nbsp;&nbsp;&nbsp;மாணவர்களின் சேர்க்கை மற்றும் வருகைப் பதிவு&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </button>-->
  <button style="padding-left:-1px; color:white;"  class="tablinks" onclick="openCity(event, 'Tokyo')">&nbsp;&nbsp;&nbsp;பள்ளி கண்காணிப்புப் படிவம்&nbsp;&nbsp;&nbsp;&nbsp;</button>
</div>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
                                                              
                                                    </div>
													</div>
                                                   
													
                                              
                                                </div>

                                              </div>
                                            </div>



                                                


                                               <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                         <div class="caption">
                                                            <i class="fa fa-globe"></i>School Monitoring Details<?php echo $classname?> 
															<input type="hidden" class="medium" id="classid" value="<?php echo $classname?>">
															</div> 
                                                        <div class="tools" style="margin-top: 20px;"> </div>
                                                    </div>
                                                    <div class="portlet-body">
													<div id="London" class="tabcontent">
													
													<div class="row">
													<table class="table table-striped table-bordered table-hover">
													<tr>
													<th style="display:none;">&nbsp;</th>
													<th style="display:none;">&nbsp;</th>
													
													 <th>பள்ளி கண்காணிப்புப் படிவம் <br></th>
                                                   	
												</tr>
<br>												
												</table>		 
                                                        <table class="table table-striped table-bordered table-hover" id='monitoring-table' border="3" style="margin-top: -21px;">
														
                                                            <tbody>
<tr>

<td  contentEditable="false" rowspan="2" style="color:green; width:10%;"><strong></strong></td>


<td style="display:none;">Count</td>
<td style="display:none;">ID</td>
<td style="display:none;">A</td>
<td style="display:none;">B</td>
<td style="display:none;">C</td>

</tr>
<tr>

<th style="display:none;" contentEditable="false"><strong>ID</strong></th>
<td  contentEditable="false"  style="color:green; width:10%;"><strong>ஆசிரியர்களின் எண்ணிக்கை </strong></td>
<th style="color:green; text-align:center;" contentEditable="false"><strong>அனுமதிக்கப் பட்டவர்கள் </strong></th>
<th style="color:green; text-align:center;" contentEditable="false"><strong>31.12.2018ன் படி பணியில் உள்ளோர் </strong></th>
<th style="color:green; text-align:center;" contentEditable="false"><strong>RTEன் படி தேவையான ஆசிரியர்கள் </strong></th>

</tr>
<tr >

<?php
$BC = $communitycount[0]->c; 
$BCMUSLIM=$communitycount[1]->c; 
$MBC  = $communitycount[2]->c;
$OC  = $communitycount[6]->c;
$DNC  = $communitycount[7]->c;
$others=$BC+$MBC+$OC+$DNC+$BCMUSLIM;

$SC1=$communitycount[5]->c;
$SC2=$communitycount[4]->c;
$YET=$SC1+$SC2;

$ST=$communitycount[3]->c;

$TOTAL=$others+$YET+$ST;
?>
 

<td contentEditable="false" >அ)</td>
<td  contentEditable="false" onKeypress="return isNumberKey(event);";>தொடக்க நிலை வகுப்புகள் (I - V)</td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_monitoring[0]->id;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);"><?=$gradetable_monitoring[0]->Allowed_teacher;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_monitoring[0]->based_on_year;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_monitoring[0]->based_on_rte;?></td>

</tr>
<tr>

<td contentEditable="false" rowspan="6">ஆ)</td>
<td  contentEditable="false" onKeypress="return isNumberKey(event);";>உயர்தொடக்கக் நிலை வகுப்புகள்  (VI - VIII )</td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_monitoring[1]->id;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_monitoring[1]->Allowed_teacher;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_monitoring[1]->based_on_year;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_monitoring[1]->based_on_rte;?></td>

</tr>
<tr >


<td  contentEditable="false" onKeypress="return isNumberKey(event);";>தமிழ்</td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_monitoring[2]->id;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_monitoring[2]->Allowed_teacher;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_monitoring[2]->based_on_year;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_monitoring[2]->based_on_rte;?></td>

</tr>
<tr>
<td  contentEditable="false" onKeypress="return isNumberKey(event);";>ஆங்கிலம்</td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_monitoring[3]->id;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_monitoring[3]->Allowed_teacher;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_monitoring[3]->based_on_year;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_monitoring[3]->based_on_rte;?></td>
</tr>
<tr >


<td  contentEditable="false" onKeypress="return isNumberKey(event);";>கணிதம்</td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_monitoring[4]->id;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_monitoring[4]->Allowed_teacher;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_monitoring[4]->based_on_year;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_monitoring[4]->based_on_rte;?></td>
</tr>
<tr >


<td  contentEditable="false" onKeypress="return isNumberKey(event);";>அறிவியல்</td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_monitoring[5]->id;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_monitoring[5]->Allowed_teacher;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_monitoring[5]->based_on_year;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_monitoring[5]->based_on_rte;?></td>

</tr>
<tr >

<td  contentEditable="false" onKeypress="return isNumberKey(event);";>சமூக அறிவியல்</td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_monitoring[6]->id;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_monitoring[6]->Allowed_teacher;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_monitoring[6]->based_on_year;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_monitoring[6]->based_on_rte;?></td>

</tr>


</tbody>
															
                                                        </table>
														
														<b><p style="padding-left: 52px;">குறிப்பு: </p>
														<p style="padding-left: 52px;">1. அ. நடுநிலைப் பள்ளிகளில் தலைமையாசிரியர் பணியிடம் சேர்த்து பதிவு செய்க 
                                                                                                                                              ஆ. சிறப்பு ஆசிரியர்கள் சேர்க்க வேண்டாம்  </p>
																																			  <p style="padding-left: 52px;">2. உயர்நிலை / மேல்நிலைப் பள்ளிகளில் பாடவாரியாக பட்டதாரி ஆசிரியர் நிலையில் உள்ள பணியிடங்களை மட்டும் பதிவு செய்க.</p></b>
														</div>
														<div class="row">
														 <?php
														
														 $status=$gradetable_monitoring[1]->status;
												
														 if($status==2 || $status==1)
														 {
															 ?>
															 <div class="col-md-offset-8 col-md-2">
													  					<a href="javascript:;" 
                                                                           class="btn btn-sm green" style="margin-left: 71px;" id="convert-table" onclick="updatemonitor();"
                                                                           data-class-section-id ="" > 
                                                                            UPDATE <i class="fa fa-plus-o "></i>
                                                                        </a>
																		</div>
																		<div class=" col-md-2">
													  					<a href="javascript:;" 
                                                                           class="btn btn-sm red" id="final" onclick="finalmonitoringsave();"
                                                                           data-class-section-id ="<?php echo $d->id;  ?>" > 
                                                                           Final Submit<i class="fa fa-plus-o "></i>
                                                                        </a>
																		</div>
																		<?php
														                 }
																		 else
																		 {
														                   ?>
															   <div class="col-md-offset-10 col-md-2">
													  					<a href="javascript:;" 
                                                                           class="btn btn-sm green" style="margin-top: 15px; margin-left: -17px;" id="save" onclick="savemonitor();"
                                                                           data-class-section-id ="<?php echo $d->id;  ?>" > 
                                                                            SAVE <i class="fa fa-plus-o "></i>
                                                                        </a>
																		</div>
																		<?php
																		 }
																		 ?>
																		
																		</div> 
														</div>
														<div id="Paris" class="tabcontent">
  <table class="table table-striped table-bordered table-hover">
													<tr>
													<th style="display:none;">&nbsp;</th>
													<th style="display:none;">&nbsp;</th>
													  <th colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
													   
													 <th style="padding-right: 5px;"><center>சேர்க்கை &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</center></th>
                                                   	 <th style="padding-right: 5px;"><center>December 2018 மாதத்தின் சராசரி வருகை  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</center></th>
													  <th style="padding-right: 8px;"><center>December 2018 மாதத்தின் சராசரி வருகை சதவீதம் (%) </center></th>
												</tr>												
												</table>
															 
                                                        <table class="table table-striped table-bordered table-hover" id='studentreg-table' border="3" style="margin-top: -21px; text-align:center;">

														
                                              
                                                            <tbody>
														

<tr>


<td style="display:none;">Class</td>
<td style="display:none;">ID</td>
<td style="display:none;">A</td>
<td style="display:none;">B</td>
<td style="display:none;">C</td>
<td style="display:none;">D</td>
<td style="display:none;">E</td>
<td style="display:none;">F</td>
<td style="display:none;">G</td>
<td style="display:none;">H</td>
<td style="display:none;">I</td>


</tr>
<tr>

<th style="display:none;" contentEditable="false"><strong>ID</strong></th>
<td  contentEditable="false"  style="color:green; width:10%;"><strong>வகுப்பு </strong></td>
<th style="color:green" contentEditable="false"><strong>ஆண்கள் </strong></th>
<th style="color:green" contentEditable="false"><strong>பெண்கள் </strong></th>
<th style="color:green" contentEditable="false"><strong>மொத்தம் </strong></th>

<th style="color:green" contentEditable="false"><strong>ஆண்கள் </strong></th>
<th style="color:green" contentEditable="false"><strong>பெண்கள் </strong></th>
<th style="color:green" contentEditable="false"><strong>மொத்தம் </strong></th>

<th style="color:green" contentEditable="false"><strong>ஆண்கள் </strong></th>
<th style="color:green" contentEditable="false"><strong>பெண்கள் </strong></th>
<th style="color:green" contentEditable="false"><strong>மொத்தம் </strong></th>

</tr>
<tr>

<?php
$BC = $communitycount[0]->c; 
$BCMUSLIM=$communitycount[1]->c; 
$MBC  = $communitycount[2]->c;
$OC  = $communitycount[6]->c;
$DNC  = $communitycount[7]->c;
$others=$BC+$MBC+$OC+$DNC+$BCMUSLIM;

$SC1=$communitycount[5]->c;
$SC2=$communitycount[4]->c;
$YET=$SC1+$SC2;

$ST=$communitycount[3]->c;

$TOTAL=$others+$YET+$ST;
?>
 
	 

<td contentEditable="false"><strong>I</strong></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_studentreg[0]->id;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);"><?=$gradetable_studentreg[0]->RB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[0]->RG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[0]->RT;?></td>

<td style="text-align:center;"  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[0]->YEB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[0]->YEG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[0]->YET;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[0]->YEPB;?></td>
<td style="text-align:center;"  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[0]->YEPG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[0]->YEPT;?></td>

</tr>
<tr>
<td contentEditable="false"><strong>II</strong></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_studentreg[1]->id;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[1]->RB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[1]->RG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[1]->RT;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[1]->YEB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[1]->YEG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[1]->YET;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[1]->YEPB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[1]->YEPG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[1]->YEPT;?></td>

</tr>
<tr >
<td >
<p contentEditable="false"><strong>III</strong></p>

</td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_studentreg[2]->id;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[2]->RB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[2]->RG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[2]->RT;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[2]->YEB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[2]->YEG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[2]->YET;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[2]->YEPB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[2]->YEPG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[2]->YEPT;?></td>

</tr>
<tr>
<td contentEditable="false"><strong>IV</strong></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_studentreg[3]->id;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[3]->RB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[3]->RG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[3]->RT;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[3]->YEB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[3]->YEG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[3]->YET;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[3]->YEPB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[3]->YEPG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[3]->YEPT;?></td>

</tr>
<tr >

<td contentEditable="false"><strong>V</strong></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_studentreg[4]->id;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[4]->RB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[4]->RG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[4]->RT;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[4]->YEB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[4]->YEG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[4]->YET;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[4]->YEPB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[4]->YEPG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[4]->YEPT;?></td>

</tr>

<tr style="background-color:lightblue;">
<td contentEditable="false"><strong>மொத்தம் (I - V)</strong></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_studentreg[5]->id;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[5]->RB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[5]->RG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[5]->RT;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[5]->YEB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[5]->YEG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[5]->YET;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[5]->YEPB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[5]->YEPG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[5]->YEPT;?></td>

</tr>
<tr >
<td >
<p contentEditable="false"><strong>VI</strong></p>

</td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_studentreg[6]->id;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[6]->RB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[6]->RG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[6]->RT;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[6]->YEB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[6]->YEG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[6]->YET;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[6]->YEPB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[6]->YEPG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[6]->YEPT;?></td>

</tr>
<tr>
<td contentEditable="false"><strong>VII</strong></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_studentreg[7]->id;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[7]->RB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[7]->RG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[7]->RT;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[7]->YEB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[7]->YEG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[7]->YET;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[7]->YEPB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[7]->YEPG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[7]->YEPT;?></td>

</tr>
<tr>

<td contentEditable="false"><strong>VIII</strong></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_studentreg[8]->id;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[8]->RB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[8]->RG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[8]->RT;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[8]->YEB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[8]->YEG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[8]->YET;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[8]->YEPB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[8]->YEPG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[8]->YEPT;?></td>

</tr>
<tr>
<td contentEditable="false"><strong>மாதம் ஒரு முறை </strong></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_studentreg[9]->id;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[9]->RB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[9]->RG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[9]->RT;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[9]->YEB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[9]->YEG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[9]->YET;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[9]->YEPB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[9]->YEPG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[9]->YEPT;?></td>

</tr>
<tr style="background-color:lightblue;">
<td>
<p contentEditable="false"><strong>பெரு மொத்தம் (I - VIII)</strong></p>

</td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_studentreg[10]->id;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[10]->RB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[10]->RG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[10]->RT;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[10]->YEB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[10]->YEG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[10]->YET;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[10]->YEPB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[10]->YEPG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[10]->YEPT;?></td>

</tr>
<tr >
<td contentEditable="false"><strong>IX</strong></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_studentreg[11]->id;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[11]->RB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[11]->RG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[11]->RT;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[11]->YEB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[11]->YEG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[11]->YET;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[11]->YEPB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[11]->YEPG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[11]->YEPT;?></td>

</tr>
<tr >


<td contentEditable="false"><strong>X</strong></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_studentreg[12]->id;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[12]->RB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[12]->RG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[12]->RT;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[12]->YEB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[12]->YEG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[12]->YET;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[12]->YEPB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[12]->YEPG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[12]->YEPT;?></td>

</tr>
</tr>
<tr style="background-color:lightblue;">
<td contentEditable="false"><strong>பெரு மொத்தம் (IX- X)</strong></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_studentreg[13]->id;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[13]->RB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[13]->RG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[13]->RT;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[13]->YEB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[13]->YEG;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[13]->YET;?></td>

<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[13]->YEPB;?></td>
<td  style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[13]->YEPG;?></td>
<td style="text-align:center;" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_studentreg[13]->YEPT;?></td>

</tr>




</tbody>
															
                                                        </table>
														<div class="row">
														 <?php
														
														 $status=$gradetable_studentreg[1]->status;
												
														 if($status==2 || $status==1)
														 {
															 ?>
															 <div class="col-md-offset-8 col-md-2">
													  					<a href="javascript:;" 
                                                                           class="btn btn-sm green" style="margin-left: 71px;" id="convert-table" onclick="updatestudentreg();"
                                                                           data-class-section-id ="" > 
                                                                            UPDATE <i class="fa fa-plus-o "></i>
                                                                        </a>
																		</div>
																		<div class=" col-md-2">
													  					<a href="javascript:;" 
                                                                           class="btn btn-sm red"  id="final1" onclick="finalstudentregsave();"
                                                                           data-class-section-id ="<?php echo $d->id;  ?>" > 
                                                                           Final Submit<i class="fa fa-plus-o "></i>
                                                                        </a>
																		</div>
																		<?php
														                 }
																		 else
																		 {
														                   ?>
															   <div class="col-md-offset-10 col-md-2">
													  					<a href="javascript:;" 
                                                                           class="btn btn-sm green" id="save1" onclick="savestudent();"
                                                                           data-class-section-id ="<?php echo $d->id;  ?>" > 
                                                                            SAVE <i class="fa fa-plus-o "></i>
                                                                        </a>
																		</div>
																		<?php
																		 }
																		 ?>
																		
																		</div> 
                                                                      </div>
																	  
																	  <div id="Tokyo" class="tabcontent">
													
															 
                                                        <table class="table table-striped table-bordered table-hover" id='answer-table' border="3" style="width:100%">
<style>
td{text-align:left}
th{text-align:left}
</style>
														
                                              
                                                            <tbody>
														

<tr>
<td  contentEditable="false" rowspan="2" style="color:green; width:10%;"><strong>Section</strong></td>
<td contentEditable="false" rowspan="2" style="color:green; width:30%;"><strong>Question</strong></td>
<td  contentEditable="false" rowspan="2" style="color:green; width:60%;"><strong>Option</strong></td>

<td style="display:none;">ID</td>


</tr>
<tr>

<th style="display:none;" contentEditable="false"><strong>ID</strong></th>
<td  id="id" style="display:none;"><?=$answer_details[0]->id;?>
</tr>
<tr>

 
<td contentEditable="false" rowspan="8"  value="3"><strong>1</strong></td>	 
<td contentEditable="false" rowspan="8"><strong>மாணவர்களின் வருகையை அதிகரிக்க பள்ளியில் மேற்கொள்ளப்படும் நடவடிக்கைகள் ( செய்க)</strong></td>
<td ><input type="checkbox" id="ans1"  name="ansone" class="chk1" value="1">&nbsp;&nbsp;பெற்றோர்களை நேரில் அவர்களது வீட்டில் சந்தித்து அரசு பள்ளிகளில் மாணவர்களின் சேர்க்கைக்கு ஊக்குவித்தல்.</td>



</tr>
<tr>
<td ><input type="checkbox" id="ans2" name="selector[]"  class="chk1" value="2">&nbsp;&nbsp;அரசுப்பள்ளிகளில் மாணவர்களுக்கு அளிக்கப்படும் நலத்திட்டங்கள் குறித்து பெற்றோர்கள் அறியச் செய்தல்.</td>

</tr>
<tr >
<td ><input type="checkbox" id="ans3" name="selector[]"  class="chk1" value="3">&nbsp;&nbsp;துண்டு பிரசுரங்களை விநியோகிப்பது. </td>



</tr>
<tr >
<td ><input type="checkbox" id="ans4" name="selector[]"  class="chk1" value="4">&nbsp;&nbsp;பெற்றோர்கள் அடங்கிய Whatsapp குழு அமைத்து பள்ளி செயல்பாடுகளை மக்கள் அறியச்செய்தல் </td>


</tr>
<tr >
<td ><input type="checkbox" id="ans5"  name="selector[]"  class="chk1" value="5">&nbsp;&nbsp;ஆண்டு விழாக்களை விமரிசையாக நடத்தி மாணவர்களின் தனித்திறமையை பெற்றோர்கள் அறியச் செய்தல். </td>


</tr>
<tr >
<td><input type="checkbox" id="ans6" name="selector[]"  class="chk1" value="6">&nbsp;&nbsp;பள்ளி மேலாண்மைக்கு குழுவினருடன் மாணவர் சேர்க்கை அதிகரிக்க மேற்கொள்ள வேண்டிய செயல்திட்டம் குறித்து கலந்துரையாடல் </td>


</tr>
<tr >
<td ><input type="checkbox" id="ans7" name="selector[]"  class="chk1" value="7">&nbsp;&nbsp;மாணவர்களுக்கு போக்குவரத்து வசதி செய்து தருதல் </td>


</tr>
<tr >
<td ><input type="checkbox" id="ans8" name="selector[]"  class="chk1" value="8">&nbsp;&nbsp;ஆங்கில வழிக்கல்வி வகுப்புகளை தொடங்கி திறம்பட செயல்படுத்துதல்  </td>


</tr>

<tr >
<td contentEditable="false" rowspan="3" ><strong>2</strong></td>
<td contentEditable="false" rowspan="3"><strong>தங்கள் வகுப்பறையில் உள்ளடங்கிய கல்வி மேம்பட தாங்கள் எடுக்கும் குறிப்பிட்ட முயற்சிகளை செய்கை</strong></td>
<td><input type="checkbox" id="ans21" name="anstwo" class="chk2" value="1">&nbsp;&nbsp;தேவையான கற்றல் கற்பித்தல் உபகரணங்களை அதிக அளவில் தயாரித்து பயன்படுத்துதல்.</td>


</tr>
<tr >
<td><input type="checkbox" id="ans22" name="anstwo" class="chk2" value="2">&nbsp;&nbsp;குழு செயல்பாடுகளில் அவர்களை பங்கேற்கச் செய்தல் </td>


</tr>
<tr >
<td><input type="checkbox" id="ans23" name="anstwo" class="chk2" value="3">&nbsp;&nbsp;வினாக்களுக்கு அம்மாணவர்கள் பதில் அளிக்கும் பொது அல்லது எழுத்துத் தேர்வுகளில் ஈடுபடும் பொது அவர்களுக்கு அதிக நேரம் அளித்து ஊக்குவித்தல்
</td>



</tr>

<tr>
<td contentEditable="false" rowspan="4" ><strong>3</strong>
<td contentEditable="false" rowspan="4"><strong>தங்கள் வகுப்பறையில் உள்ளடங்கிய கல்வி மேம்பட தாங்கள் எடுக்கும் குறிப்பிட்ட முயற்சிகளை செய்கை</strong>
<p>&nbsp;</p>
</td>
<td ><input type="checkbox" id="ans31" name="ansthree" class="chk3" value="1">&nbsp;&nbsp;கற்றல் கற்பித்தல் உபகரணங்களை அதிக அளவில் பயன்படுத்துதல். </td>



</tr>
<tr>
<td ><input type="checkbox" id="ans32" name="ansthree" class="chk3" value="2">&nbsp;&nbsp;தெளிவானதும் விரிவானதுமான பாடக்குறிப்புகளை தயாரித்து வகுப்பறை நிகழ்வுடன் வாழ்க்கையில் அன்றாடம் சந்திக்கும் நிகழ்வுகளை இணைத்து விளக்குதல்</td>



</tr>
<tr>
<td ><input type="checkbox" id="ans33" name="ansthree" class="chk3" value="3">&nbsp;&nbsp;கற்றல் விளைவுகளை கரும்பலகையில் எழுதி மாணவர்கள் அரியச் செய்து பாடம் நடத்துதல் 
மாணவர்களின் கற்றாழை வகுப்பறையிலேயே உருது செய்தல் .</td>



</tr>
<tr>
<td><input type="checkbox" id="ans34" name="ansthree" class="chk3" value="4">&nbsp;&nbsp;FA (A) & FA (B) மதிப்பீடுகளை கற்பித்தல் மேம்படும் வகையில் மேற்கொள்ளுதல் </td>


</tr>
<tr>
<td  rowspan="5" ><strong>4</strong>
<td  rowspan="5"><strong>விளையாட்டு மற்றும் போட்டிகளில் மாணவர்களின் பங்கேற்பினை எவ்வாறு உறுதி செய்வீர்கள் ?</strong>
<p>&nbsp;</p>
</td>
<td><input type="checkbox" id="ans41" name="ansfour" class="chk4" value="1">&nbsp;&nbsp;விளையாட்டு பிரிவு நேரத்தில் அணைத்து மாணவர்களும் அவர்களுக்கு பிடித்தமான விளையாட்டில் மகிழ்வுடன் ஈடுபட செய்தல் </td>



</tr>
</tr>
<tr>
<td><input type="checkbox" id="ans42" name="ansfour" class="chk4" value="2">&nbsp;&nbsp;விளையாட்டின் மூலம் விட்டுக்கொடுத்தல், தோல்விகளை ஏற்றல், நட்புணர்வுடன் அணுகுதல், சிறப்பாக தனது குழுவை வழிநடத்துதல், பாரபட்சமின்மை போன்ற பண்புகளை வளர்த்தல்</td>

</tr>
<tr>
<td ><input type="checkbox" id="ans43" name="ansfour" class="chk4" value="3">&nbsp;&nbsp;மாணவர்கள் விளையாட்டு விதிமுறைகளை நேர்மையாகவும் முறையாகவும் பின்பற்றி விளையாட செய்தல் </td>

</tr>
<tr >
<td ><input type="checkbox" id="ans44" name="ansfour" class="chk4" value="4">&nbsp;&nbsp;வெற்றிகளைப் போல தோல்விகளையும் நேர்மறை பண்புடன் ஏற்றுக் கொள்ளச் செய்தல் </td>
</tr>
<tr >
<td >&nbsp;&nbsp;வேறு ஏதேனும் <input style="width:60%;" type="textbox" name="ansfour" id="ansfourtext" value=""></td>

</tr>
<tr>
<td  contentEditable="false" ><strong>5(a)</strong></td>
<td  contentEditable="false" ><strong>பகுதி ஈ : தொடர் மற்றும் முழுமையான மதிப்பீடு முறை (CCE)</br></br>
தொடர் மற்றும் முழுமையான மதிப்பீட்டு முறை மேம்பட மாணவர் திரள் பதிவேடு அட்டை வழங்கப்படுகிறதா?
</strong></td>
<td contentEditable="false"><strong><input type="radio" id="ans5a1" name="ansfivea" value="1">&nbsp;&nbsp;YES  <input type="radio" id="ans5a2" name="ansfivea" value="2">&nbsp;&nbsp;NO</strong></td>


</tr>
<tr >
<td rowspan="3"><strong>5(b)</strong>
<td  ><strong>பகுதி ஈ : தொடர் மற்றும் முழுமையான மதிப்பீடு முறை (CCE)
<br>
<br>
மாணவர்களின் திரள் பதிவேடு அறிக்கை அட்டைகளின் விவரங்கள் எப்போது பெற்றோருடன் கலந்தாலோசிக்கப்படுகிறது? </strong>
<p>&nbsp;</p>
</td>
<td contentEditable="false"><input type="radio" id="ans5b1" name="ansfiveb" value="1">&nbsp;&nbsp;ஆண்டிற்கு ஒரு முறை  <br><br><br><input type="radio" id="ans5b2" name="ansfiveb" value="2">&nbsp;&nbsp;காலாண்டிற்கு ஒரு முறை   <br><br><br><input type="radio" id="ans5b3" name="ansfiveb" value="3">&nbsp;&nbsp;மாதம் ஒரு முறை  </td>

</tr>
</tr>

</tbody>
															
                                                        </table>

														<br>
														<br>
														<br>
														 <div class="row">
														 <?php
														
														 $ansstatus=$answer_details[0]->status;
												
														 if($ansstatus==2 || $ansstatus==1)
														 {
															 ?>
															
															 <div class="col-md-offset-8 col-md-2">
													  					<a href="javascript:;" 
                                                                           class="btn btn-sm green" style="margin-top: -79px; margin-left: 71px;" id="convert-table" onclick="updateanswer();"
                                                                           data-class-section-id ="" > 
                                                                            UPDATE <i class="fa fa-plus-o "></i>
                                                                        </a>
																		</div>
																		<div class=" col-md-2">
													  					<a href="javascript:;" 
                                                                           class="btn btn-sm red" style="margin-top: -79px; " id="final31" onclick="finalanswer();"
                                                                           data-class-section-id ="<?php echo $d->id;  ?>" > 
                                                                           Final Submit<i class="fa fa-plus-o "></i>
                                                                        </a>
																		</div>
																		<?php
														                 }
																		 else
																		 {
														                   ?>
															   <div class="col-md-offset-10 col-md-2">
													  					<a href="javascript:;" 
                                                                           class="btn btn-sm green" style="margin-top: -79px; margin-left: -17px;" id="save31" onclick="saveanswer();"
                                                                           data-class-section-id ="<?php echo $d->id;  ?>" > 
                                                                            SAVE <i class="fa fa-plus-o "></i>
                                                                        </a>
																		</div>
																		<?php
																		 }
																		 ?>
																		
																		</div> 
																		
																	  
														<br>
														<br>
														<br>
														 
                                                    </div>
													
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->           

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

        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.js';?>" type="text/javascript"></script        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-typeahead/bootstrap3-typeahead.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/select2/js/select2.full.min.js';?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
		<script src="<?php echo base_url().'asset/js/tabletojson-vit/src/jquery.tabletojson.js';?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        
        <script type="text/javascript">
		// function tableshow()
		// {
			// var a=$("#schoolcat").val();
			// alert(a);
			// document.getElementById("example-table").style.display == "none"
		// }
$(document).ready(function(){
	var status='';	
var gradedetails = <?php echo json_encode($gradetable_monitoring, JSON_PRETTY_PRINT)?>;

if(gradedetails.length !=0){
 status=gradedetails[0].status;
 }else
 {
	 status = 0;
 }

if(status==3)
{

 $("#save").hide();
 $("#final").hide();
}
var status1='';	
var gradedetails1 = <?php echo json_encode($gradetable_studentreg, JSON_PRETTY_PRINT)?>;
if(gradedetails1.length !=0){
 status1=gradedetails1[0].status;
 }else
 {
	 status1 = 0;
 }

if(status1==3)
{

 $("#save1").hide();
 $("#final1").hide();
}
var status2='';	
var answerdetails = <?php echo json_encode($answer_details, JSON_PRETTY_PRINT)?>;
if(answerdetails.length !=0){
 status2=answerdetails[0].status;

 }else
 {
	 status2 = 0;
 }

if(status2==3)
{

 $("#save31").hide();
 $("#final31").hide();
}
	var answerdetails = <?php echo json_encode($answer_details, JSON_PRETTY_PRINT)?>;
	if(answerdetails !='')
	{
	answer1=answerdetails[0].a1;
	
	  var answer = answer1.split(',');
	  $.each( answer, function( key, value ) {
      answer=value
	  switch (parseInt(answer)) {
  case 1:
    $("#ans1").prop( "checked",true);
    break;
  case 2:
   $("#ans2").prop( "checked",true);
    break;
  case 3:
     $("#ans3").prop( "checked",true);
    break;
  case 4:
    $("#ans4").prop( "checked",true);
    break;
  case 5:
    $("#ans5").prop( "checked",true);
    break;
  case 6:
   $("#ans6").prop( "checked",true);
    break;
  case 7:
 $("#ans7").prop( "checked",true);
    $("#ans7").prop( "checked",true);
	break;
	case 8:
 $("#ans8").prop( "checked",true);
    $("#ans8").prop( "checked",true);
	break;
	default:
	break;
  }
});
	}
var answerdetails = <?php echo json_encode($answer_details, JSON_PRETTY_PRINT)?>;	
 if(answerdetails !='')
	{
 answer2=answerdetails[0].a2;	

 var answertwo = answer2.split(',');
	  $.each( answertwo, function( key, value ) {
      ans2=value
switch (parseInt(ans2)) {
  case 1:
    $("#ans21").prop( "checked",true);
    break;
  case 2:
   $("#ans22").prop( "checked",true);
    break;
  case 3:
     $("#ans23").prop( "checked",true);
    break;
	default:
	break;
}	
	});
	}
	var answerdetails = <?php echo json_encode($answer_details, JSON_PRETTY_PRINT)?>;	
 if(answerdetails !='')
	{
answer3=answerdetails[0].a3;
 var answerthree = answer3.split(',');	
 $.each( answerthree, function( key, value ) {
      ans3=value
switch (parseInt(ans3)) {
  case 1:
    $("#ans31").prop( "checked",true);
    break;
  case 2:
   $("#ans32").prop( "checked",true);
    break;
  case 3:
     $("#ans33").prop( "checked",true);
    break;
	case 4:
     $("#ans34").prop( "checked",true);
    break;
	default:
	break;
}	
 });
	}
	var answerdetails = <?php echo json_encode($answer_details, JSON_PRETTY_PRINT)?>;	
 if(answerdetails !='')
	{
answer4=answerdetails[0].a4;
var answerfour = answer4.split(',');	
 $.each( answerfour, function( key, value ) {
      ans4=value	
switch (parseInt(ans4)) {
  case 1:
    $("#ans41").prop( "checked",true);
    break;
  case 2:
   $("#ans42").prop( "checked",true);
    break;
  case 3:
     $("#ans43").prop( "checked",true);
    break;
	case 4:
     $("#ans44").prop( "checked",true);
    break;
	default:
	break;
}
 });
	}
var answerdetails = <?php echo json_encode($answer_details, JSON_PRETTY_PRINT)?>;	
 if(answerdetails !='')
	{	
answer5=answerdetails[0].a5;	
switch (parseInt(answer5)) {
  case 1:
    $("#ans5a1").prop( "checked",true);
    break;
  case 2:
   $("#ans5a2").prop( "checked",true);
    break;
	default:
	break;
}
	}
var answerdetails = <?php echo json_encode($answer_details, JSON_PRETTY_PRINT)?>;	
 if(answerdetails !='')
	{	
answer6=answerdetails[0].a6;	
switch (parseInt(answer6)) {
  case 1:
    $("#ans5b1").prop( "checked",true);
    break;
  case 2:
   $("#ans5b2").prop( "checked",true);
    break;
	case 3:
   $("#ans5b3").prop( "checked",true);
    break;
	default:
	break;
}
}
var answerdetails = <?php echo json_encode($answer_details, JSON_PRETTY_PRINT)?>;	
 if(answerdetails !='')
	{
answertext=answerdetails[0].a4text;	
$("#ansfourtext").val(answertext);
	}

  }); 


        
     
function savemonitor() {
  var table = $('#monitoring-table').tableToJSON(); // Convert the table into a javascript object

  var value=(JSON.stringify(table));
				$.ajax(
				{
					data:{'records':value},
					url:baseurl+'Home/emis_school_monitoring_add',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{ 
						 swal("OK", "School Data Successfully", "success");
						 window.location.reload();
						
					}
				});
  
}
function updatemonitor()
{
  var table = $('#monitoring-table').tableToJSON();
  var value=(JSON.stringify(table));
				$.ajax(
				{
					data:{'records':value},
					url:baseurl+'Home/emis_school_monitoring_update',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{
						
						 
						 swal("OK", "School Data Update Successfully", "success");
						 window.location.reload();
						
					}
				});
}
function finalmonitoringsave()
{
	var table = $('#monitoring-table').tableToJSON(); // Convert the table into a javascript object
   var value=(JSON.stringify(table));
   swal({
        title: "Are you sure?",
        text:  "Do you want to Final Submit? Entries Can't Be Changed !",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, Final Submit!",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
   }, function(isConfirm){
    if (isConfirm)
				$.ajax(
				{
					data:{'records':value},
					url:baseurl+'Home/emis_school_monitoring_update_final',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{
						
						 
						 swal("OK", "School Grade Finally Updated Successfully", "success");
						 window.location.reload();
						
					}
				});
				 else
				 
        swal("Cancelled", "Your cancelled the Final Submit", "error");
    });	
	
}
function savestudent() {
  var table = $('#studentreg-table').tableToJSON(); // Convert the table into a javascript object
  var value=(JSON.stringify(table));
				$.ajax(
				{
					data:{'records':value},
					url:baseurl+'Home/emis_school_studentreg_add',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{
						
						 
						 swal("OK", "School Student Data Successfully", "success");
						 window.location.reload();
						
					}
				});
  
}
function updatestudentreg()
{
  var table = $('#studentreg-table').tableToJSON();
  var value=(JSON.stringify(table));
				$.ajax(
				{
					data:{'records':value},
					url:baseurl+'Home/emis_school_studentreg_update',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{
						
						 
						 swal("OK", "School Student Data Update Successfully", "success");
						 window.location.reload();
						
					}
				});
}
function finalstudentregsave()
{
	var table = $('#studentreg-table').tableToJSON(); // Convert the table into a javascript object
   var value=(JSON.stringify(table));
   swal({
        title: "Are you sure?",
        text:  "Do you want to Final Submit? Entries Can't Be Changed !",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, Final Submit!",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
   }, function(isConfirm){
    if (isConfirm)
				$.ajax(
				{
					data:{'records':value},
					url:baseurl+'Home/emis_school_studentreg_final',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{
						
						 
						 swal("OK", "School Student Data Update Successfully", "success");
						 window.location.reload();
						
					}
				});
				 else
				 
        swal("Cancelled", "Your cancelled the Final Submit", "error");
    });	
	
}
function saveanswer()
{
	
	var answerone = [];
$(".chk1:checked").each(function() {
		answerone.push($(this).val());
	});
var answertwo = [];
$(".chk2:checked").each(function() {
		answertwo.push($(this).val());
	});	
	var answerthree = [];
$(".chk3:checked").each(function() {
		answerthree.push($(this).val());
	});
	var answerfour = [];
$(".chk4:checked").each(function() {
		answerfour.push($(this).val());
	});

var answerfourtext = $("#ansfourtext").val();	
	
	var ansfivea = $("input:radio[name=ansfivea]:checked").val()
	var ansfiveb = $("input:radio[name=ansfiveb]:checked").val()
	
	
		            $.ajax(
		            {
			data:{'ansone':answerone,'anstwo':answertwo,'ansthree':answerthree,'ansfour':answerfour,'answerfourtext':answerfourtext,'ansfivea':ansfivea,'ansfiveb':ansfiveb},
			url:baseurl+'Home/emis_school_question_answer',
			type:"POST",
			dataType:"JSON",
			success:function(res)
			{
				swal("OK", "School Answer Saved Successfully", "success");
				window.location.reload();
			}
			 
			
		    });
	
	
}
function updateanswer()
{
	var id = $("#id").text();
	var answerone = [];
$(".chk1:checked").each(function() {
		answerone.push($(this).val());
	});
	
var answertwo = [];
$(".chk2:checked").each(function() {
		answertwo.push($(this).val());
	});	
	var answerthree = [];
$(".chk3:checked").each(function() {
		answerthree.push($(this).val());
	});
	var answerfour = [];
$(".chk4:checked").each(function() {
		answerfour.push($(this).val());
	});	
	var ansfivea = $("input:radio[name=ansfivea]:checked").val()
	var ansfiveb = $("input:radio[name=ansfiveb]:checked").val()
	
var answerfourtext = $("#ansfourtext").val();
// alert(answerfourtext);
// return false;

		            $.ajax(
		            {
			data:{'id':id,'ansone':answerone,'anstwo':answertwo,'ansthree':answerthree,'ansfour':answerfour,'answerfourtext':answerfourtext,'ansfivea':ansfivea,'ansfiveb':ansfiveb},
			url:baseurl+'Home/emis_school_question_answer_update',
			type:"POST",
			dataType:"JSON",
			success:function(res)
			{
				swal("OK", "School Answer Update Successfully", "success");
				window.location.reload();
			}
			 
			
		    });
	
	
}

function finalanswer()
{
	var id = $("#id").text();
	var answerone = [];
$(".chk1:checked").each(function() {
		answerone.push($(this).val());
	});
	
var answertwo = [];
$(".chk2:checked").each(function() {
		answertwo.push($(this).val());
	});	
	var answerthree = [];
$(".chk3:checked").each(function() {
		answerthree.push($(this).val());
	});
	var answerfour = [];
$(".chk4:checked").each(function() {
		answerfour.push($(this).val());
	});	
	var ansfivea = $("input:radio[name=ansfivea]:checked").val()
	var ansfiveb = $("input:radio[name=ansfiveb]:checked").val()
	var answerfourtext = $("#ansfourtext").val();
   swal({
        title: "Are you sure?",
        text: "Do you want to Final Submit? Entries Can't Be Changed !",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, Final Submit!",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
   }, function(isConfirm){
    if (isConfirm)
				$.ajax(
				{
					data:{'id':id,'ansone':answerone,'anstwo':answertwo,'ansthree':answerthree,'ansfour':answerfour,'answerfourtext':answerfourtext,'ansfivea':ansfivea,'ansfiveb':ansfiveb},
					url:baseurl+'Home/emis_school_question_answer_final',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{ 
						 swal("OK", "School Answer Finally Saved Successfully", "success");
						 window.location.reload();
						
					}
				});
				 else
				 
        swal("Cancelled", "Your cancelled the Final Submit", "error");
    });	
	
}

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}      

       
               
               //emis_no_sections
               
            
      

        </script>



    </body>

</html>