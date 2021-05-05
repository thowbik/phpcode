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
                                    <!--<div class="page-title">
                                        <h1>Profile
										
                                            <small>School profile edit and update</small>
                                        </h1>
                                    </div>-->
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
                                                    <span class="caption-subject font-dark sbold uppercase">Scholastic Achievement of Children</span>
                                                </div>
                                            </div> 
                                           
                                            <!--begin form -->
                                           

                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                          
                                        									  
                                        <center>
                                                  <form method="post" action="<?php echo base_url().'Home/emis_school_markcardtable';?>">
												   
                                                    <div class="form-group">
                                                    <div class="row">
                                                       <div class="col-md-3">  
                                                          <select style="width: 69%;" class="form-control" data-placeholder="Choose a Category" tabindex="1" id="schoolcat" name="schoolcate"  style="width: 60%" required="" onchange="gradeheader();">
                                                               	
                                                                <option value="" >Select Class</option>
																	
                                                                 <?php foreach($classdetails as $sc) {
																	   $classid=$sc->class_id;
																  switch ($classid) {
																case $sta="1":$standard='I';break;
																case $sta="2":$standard='II';break;
																case $sta="3":$standard='III';break;	
																case $sta="4":$standard='IV';break;	
																case $sta="5":$standard='V';break;
																case $sta="6":$standard='VI';break;	
																case $sta="7":$standard='VII';break;	
																case $sta="8":$standard='VIII';break;
																case $sta="9":$standard='IX';break;	
																case $sta="10":$standard='X';break;	
																case $sta="11":$standard='XI';break;	
																case $sta="12":$standard='XII';break;	
																case $sta="13":$standard='Pre KG';break;	
																case $sta="14":$standard='UKG';break;	
																case $sta="15":$standard='LKG';break;
																}	 
														 ?>
                                                               <option value="<?php echo $sta;  ?>" ><?php echo $standard;?></option>
                                                                 <?php   }  ?>
																 
                                                               </select> 
                                                        
                                                    </div>
													<div class="col-md-3">
                                                        
                                                          <button type="submit"  class="btn green" id="emis_stu_searchsep_sub" style="margin-left: -257px";>SUBMIT</button>
                                                              
                                                    </div>
													</div>
                                                    </form></center>
													
                                              
                                                </div>

                                              </div>
                                            </div>



                                                


                                               <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                       <div class="caption">
                                                            <i class="fa fa-globe"></i>Class :<?php echo $classname?> 
															<input type="hidden" class="medium" id="classid" value="<?php echo $classname?>">
															</div> 
                                                        <div class="tools" style="margin-top: 20px;"> </div>
                                                    </div>
                                                    <div class="portlet-body">
													
													<div class="row">
													<table class="table table-striped table-bordered table-hover">
													<tr>
													<th style="display:none;">&nbsp;</th>
													<th style="display:none;">&nbsp;</th>
													  <th colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
													   
													 <th style="padding-right: 75px;"><center>No.of children Scoring grades in FA (Max 40 Marks)</center></th>
                                                   	 <th style="padding-right: 75px;"><center>No.of children Scoring grades in SA (Max 60 Marks)</center></th>
													  <th style="padding-right: 28px;"><center>No.of children Scoring grades in FA & SA (Max 100 Marks)</center></th>
												</tr>												
												</table>
															 
                                                        <table class="table table-striped table-bordered table-hover" id='example-table' border="3" style="margin-top: -21px;">
<style>
td{text-align: center}
th{text-align: center}
</style>
														
                                              
                                                            <tbody>
														

<tr>
<td contentEditable="false" rowspan="2" style="color:green; width:10%;"><strong>SUBJECT</strong></td>
<td  contentEditable="false" rowspan="2" style="color:green; width:10%;"><strong>COMMUNITY</strong></td>
<td  contentEditable="false" rowspan="2" style="color:green; width:10%;"><strong>No.Enrolled</strong></td>
<td  contentEditable="false" rowspan="2" style="color:green; width:10%;"><strong>No.Assesed</strong></td>
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
<td style="display:none;">J</td>
<td style="display:none;">K</td>
<td style="display:none;">L</td>

</tr>
<tr>

<th style="display:none;" contentEditable="false"><strong>ID</strong></th>
<th style="color:green" contentEditable="false"><strong>A</strong></th>
<th style="color:green" contentEditable="false"><strong>B</strong></th>
<th style="color:green" contentEditable="false"><strong>C</strong></th>
<th class="d" style="color:green" contentEditable="flase"><strong>D</strong></th>
<th style="color:green" contentEditable="false"><strong>A</strong></th>
<th style="color:green" contentEditable="false"><strong>B</strong></th>
<th style="color:green" contentEditable="false"><strong>C</strong></th>
<th class="d" style="color:green" contentEditable="flase"><strong>D</strong></th>
<th style="color:green" contentEditable="false"><strong>A</strong></th>
<th style="color:green" contentEditable="false"><strong>B</strong></th>
<th style="color:green" contentEditable="false"><strong>C</strong></th>
<th class="d" style="color:green" contentEditable="flase"><strong>D</strong></th>
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
$SC=$SC1+$SC2;

$ST=$communitycount[3]->c;

$TOTAL=$others+$SC+$ST;
?>
 
	 
<td contentEditable="false" rowspan="3"><strong>TAMIL</strong></td>
<td contentEditable="false"><strong>SC</strong></td>
<td contentEditable="false" ><?=$SC?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);"><?=$gradetable[0]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable[0]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);"><?=$gradetable[0]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[0]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[0]->FC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[0]->FD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[0]->SA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[0]->SB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[0]->SC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[0]->SD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[0]->FSA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[0]->FSB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[0]->FSC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[0]->FSD;?></td>
</tr>
<tr>
<td contentEditable="false"><strong>ST</strong></td>
<td contentEditable="false"><?=$ST;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[1]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable[1]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[1]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[1]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[1]->FC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[1]->FD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[1]->SA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[1]->SB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[1]->SC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[1]->SD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[1]->FSA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[1]->FSB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[1]->FSC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[1]->FSD;?></td>
</tr>
<tr >
<td >
<p contentEditable="false"><strong>OTHERS</strong></p>
<p contentEditable="false"><strong>MBC,BC,OC,DNC</strong></p>
</td>
<td contentEditable="false"><?=$others;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[2]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable[2]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[2]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[2]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[2]->FC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[2]->FD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[2]->SA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[2]->SB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[2]->SC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[2]->SD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[2]->FSA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[2]->FSB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[2]->FSC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[2]->FSD;?></td>
</tr>
<!--<tr style="background-color:lightblue;">
<td contentEditable="false"><strong>TOTAL</strong></td>
<td  contentEditable="false" ><?=$TOTAL;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[3]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable[3]->id;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[3]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[3]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[3]->FC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[3]->FD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[3]->SA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[3]->SB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[3]->SC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[3]->SD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[3]->FSA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[3]->FSB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[3]->FSC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[3]->FSD;?></td>
</tr>-->
<tr >
<td contentEditable="false" rowspan="3"><strong>ENGLISH</strong></td>
<td contentEditable="false"><strong>SC</strong></td>
<td contentEditable="false" ><?=$SC?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[3]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable[3]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[3]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[3]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[3]->FC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[3]->FD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[3]->SA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[3]->SB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[3]->SC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[3]->SD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[3]->FSA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[3]->FSB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[3]->FSC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[3]->FSD;?></td>
</tr>
<tr >
<td contentEditable="false"><strong>ST</strong></td>
<td contentEditable="false"><?=$ST;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[4]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable[4]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[4]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[4]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[4]->FC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[4]->FD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[4]->SA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[4]->SB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[4]->SC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[4]->SD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[4]->FSA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[4]->FSB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[4]->FSC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[4]->FSD;?></td>
</tr>
<tr >
<td >
<p contentEditable="false"><strong>OTHERS</strong></p>
<p contentEditable="false"><strong>MBC,BC,OC,DNC</strong></p>
</td>
<td contentEditable="false"><?=$others;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[5]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable[5]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[5]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[5]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[5]->FC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[5]->FD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[5]->SA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[5]->SB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[5]->SC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[5]->SD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[5]->FSA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[5]->FSB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[5]->FSC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[5]->FSD;?></td>
</tr>
<!--<tr style="background-color:lightblue;">
<td contentEditable="false"><strong>TOTAL</strong></td>
<td  contentEditable="false"><?=$TOTAL;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[7]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable[7]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[7]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[7]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[7]->FC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[7]->FD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[7]->SA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[7]->SB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[7]->SC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[7]->SD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[7]->FSA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[7]->FSB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[7]->FSC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[7]->FSD;?></td>
</tr>-->
<tr>
<td contentEditable="false" rowspan="3"><strong>MATHS</strong>
<p>&nbsp;</p>
</td>
<td contentEditable="false"><strong>SC</strong></td>
<td contentEditable="false" ><?=$SC?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[6]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable[6]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[6]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[6]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[6]->FC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[6]->FD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[6]->SA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[6]->SB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[6]->SC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[6]->SD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[6]->FSA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[6]->FSB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[6]->FSC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[6]->FSD;?></td>
</tr>
<tr>
<td contentEditable="false"><strong>ST</strong></td>
<td contentEditable="false"><?=$ST;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[7]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable[7]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[7]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[7]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[7]->FC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[7]->FD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[7]->SA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[7]->SB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[7]->SC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[7]->SD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[7]->FSA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[7]->FSB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[7]->FSC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[7]->FSD;?></td>
</tr>
<tr>
<td>
<p contentEditable="false"><strong>OTHERS</strong></p>
<p contentEditable="false"><strong>MBC,BC,OC,DNC</strong></p>
</td>
<td contentEditable="false"><?=$others;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[8]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable[8]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[8]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[8]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[8]->FC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[8]->FD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[8]->SA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[8]->SB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[8]->SC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[8]->SD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[8]->FSA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[8]->FSB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[8]->FSC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[8]->FSD;?></td>
</tr>
<!--<tr style="background-color:lightblue;">
<td contentEditable="false"><strong>TOTAL</strong></td>
<td  contentEditable="false"><?=$TOTAL;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[11]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable[11]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[11]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[11]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[11]->FC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[11]->FD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[11]->SA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[11]->SB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[11]->SC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[11]->SD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[11]->FSA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[11]->FSB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[11]->FSC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[11]->FSD;?></td>
</tr>-->
<tr >
<td  rowspan="3"><strong>SCIENCE</strong>
<p>&nbsp;</p>
</td>
<td contentEditable="false"><strong>SC</strong></td>
<td contentEditable="false" ><?=$SC?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[9]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable[9]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[9]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[9]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[9]->FC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[9]->FD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[9]->SA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[9]->SB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[9]->SC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[9]->SD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[9]->FSA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[9]->FSB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[9]->FSC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[9]->FSD;?></td>
</tr>
</tr>
<tr>
<td contentEditable="false"><strong>ST</strong></td>
<td contentEditable="false"><?=$ST;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[10]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable[10]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[10]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[10]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[10]->FC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[10]->FD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[10]->SA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[10]->SB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[10]->SC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[10]->SD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[10]->FSA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[10]->FSB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[10]->FSC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[10]->FSD;?></td>
</tr>
<tr>
<td>
<p contentEditable="false"><strong>OTHERS</strong></p>
<p contentEditable="false"><strong>MBC,BC,OC,DNC</strong></p>
</td>
<td contentEditable="false"><?=$others;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[11]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable[11]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[11]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[11]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[11]->FC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[11]->FD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[11]->SA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[11]->SB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[11]->SC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[11]->SD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[11]->FSA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[11]->FSB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[11]->FSC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[11]->FSD;?></td>
</tr>
<!--<tr style="background-color:lightblue;">
<td contentEditable="false"><strong>TOTAL</strong></td>
<td  contentEditable="false"><?=$TOTAL;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[15]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable[15]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[15]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[15]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[15]->FC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[15]->FD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[15]->SA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[15]->SB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[15]->SC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[15]->SD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[15]->FSA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[15]->FSB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[15]->FSC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[15]->FSD;?></td>
</tr>-->
<tr>
<td  contentEditable="false" rowspan="3"><strong>S.SCIENCE</strong></td>
<td contentEditable="false"><strong>SC</strong></td>
<td contentEditable="false" ><?=$SC?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[12]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable[12]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[12]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[12]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[12]->FC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[12]->FD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[12]->SA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[12]->SB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[12]->SC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[12]->SD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[12]->FSA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[12]->FSB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[12]->FSC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[12]->FSD;?></td>
</tr>
<tr>
<td contentEditable="false"><strong>ST</strong></td>
<td contentEditable="false"><?=$ST;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[13]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable[13]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[13]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[13]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[13]->FC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[13]->FD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[13]->SA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[13]->SB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[13]->SC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[13]->SD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[13]->FSA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[13]->FSB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[13]->FSC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[13]->FSD;?></td>
</tr>
<tr>
<td >
<p contentEditable="false"><strong>OTHERS</strong></p>
<p contentEditable="false"><strong>MBC,BC,OC,DNC</strong></p>
</td>
<td contentEditable="false"><?=$others;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[14]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable[14]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[14]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[14]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[14]->FC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[14]->FD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[14]->SA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[14]->SB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[14]->SC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[14]->SD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[14]->FSA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[14]->FSB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[14]->FSC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[14]->FSD;?></td>
</tr>
<!--<tr style="background-color:lightblue;">
<td contentEditable="false"><strong >TOTAL</strong></td>
<td style="background-color:lightblue" contentEditable="false"><strong><?=$TOTAL;?></strong></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[19]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable[19]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[19]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[19]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[19]->FC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[2]->FD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[19]->SA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[19]->SB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[19]->SC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[19]->SD;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[19]->FSA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[19]->FSB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[19]->FSC;?></td>
<td  class="d" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable[19]->FSD;?></td>
</tr>-->

</tbody>
															
                                                        </table>

														<br>
														<br>
														<br>
														 <div class="row">
														 <?php
														
														 $status=$gradetable[1]->status;
												
														 if($status==2 || $status==1)
														 {
															 ?>
															
															 <div class="col-md-offset-8 col-md-2">
													  					<a href="javascript:;" 
                                                                           class="btn btn-sm green" style="margin-top: -79px; margin-left: 71px;" id="convert-table" onclick="update();"
                                                                           data-class-section-id ="" > 
                                                                            UPDATE <i class="fa fa-plus-o "></i>
                                                                        </a>
																		</div>
																		<div class=" col-md-2">
													  					<a href="javascript:;" 
                                                                           class="btn btn-sm red" style="margin-top: -79px; " id="final" onclick="finalsave();"
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
                                                                           class="btn btn-sm green" style="margin-top: -79px; margin-left: -17px;" id="save" onclick="save();"
                                                                           data-class-section-id ="<?php echo $d->id;  ?>" > 
                                                                            SAVE <i class="fa fa-plus-o "></i>
                                                                        </a>
																		</div>
																		<?php
																		 }
																		 ?>
																		
																		</div> 
																
																																<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#aabcfe;}
.tg td{font-family:Arial,align:center; sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#669;
}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aabcfe;color:#039;background-color:#b9c9fe;}
.tg .tg-phtq{border-color:inherit;text-align:left;vertical-align:top}
.tg .tg-hmp3{text-align:left;vertical-align:top}
.tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
.tg .tg-ydyv{border-color:inherit;text-align:right;vertical-align:top}
.tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
.tg .tg-dvpl{border-color:inherit;text-align:right;vertical-align:top}
</style>
<div class="row">
<div class="col-md-4">
<table class="tg" style="width:105%;">
  <tr>
    <th class="tg-c3ow" colspan="8">Primary Grade Table</th>
  </tr>
  <tr>
    <td class="tg-phtq">FA</td>
    <td class="tg-phtq">GRADE</td>
    <td class="tg-hmp3" rowspan="4" style="width: 6%;"></td>
    <td class="tg-phtq">SA</td>
    <td class="tg-phtq">GRADE</td>
    <td class="tg-hmp3" rowspan="4" style="width: 6%;"></td>
    <td class="tg-phtq">TOTAL</td>
    <td class="tg-phtq">GRADE</td>
  </tr>
  <tr>
    <td class="tg-0pky">29-40</td>
    <td class="tg-0pky"><center>A</center></td>
    <td class="tg-dvpl">43-60</td>
    <td class="tg-dvpl"><center>A</center></td>
    <td class="tg-dvpl">71-100</td>
    <td class="tg-dvpl"><center>A</center></td>
  </tr>
  <tr>
    <td class="tg-phtq">17-28</td>
    <td class="tg-phtq"><center>B</center></td>
    <td class="tg-ydyv">25-42</td>
    <td class="tg-ydyv"><center>B</center></td>
    <td class="tg-ydyv">41-70</td>
    <td class="tg-ydyv"><center>B</center></td>
  </tr>
  <tr>
    <td class="tg-0pky">0-16</td>
    <td class="tg-0pky"><center>C</center></td>
    <td class="tg-dvpl">0-24</td>
    <td class="tg-dvpl"><center>C</center></td>
    <td class="tg-dvpl">0-40</td>
    <td class="tg-dvpl"><center>C</center></td>
  </tr>
</table>
</div>
<div class="col-md-8">
<table class="tg" style="width:60%;">
  <tr>
    <th class="tg-c3ow" colspan="8">Upper Primary Grade Table</th>
  </tr>
  <tr>
    <td class="tg-phtq">FA</td>
    <td class="tg-phtq">GRADE</td>
    <td class="tg-hmp3" rowspan="6" style="width: 6%;"></td>
    <td class="tg-phtq">SA</td>
    <td class="tg-phtq">GRADE</td>
    <td class="tg-hmp3" rowspan="6" style="width: 6%;"></td>
    <td class="tg-phtq">TOTAL</td>
    <td class="tg-phtq">GRADE</td>
  </tr>
  <tr>
    <td class="tg-0pky">33-40</td>
    <td class="tg-0pky"><center>A</center></td>
    <td class="tg-dvpl">49-60</td>
    <td class="tg-dvpl"><center>A</center></td>
    <td class="tg-dvpl">81-100</td>
    <td class="tg-dvpl"><center>A</center></td>
	
  </tr>
  <tr>
    <td class="tg-phtq">25-32</td>
    <td class="tg-phtq"><center>B</center></td>
    <td class="tg-ydyv">37-48</td>
    <td class="tg-ydyv"><center>B</center></td>
    <td class="tg-ydyv">61-80</td>
    <td class="tg-ydyv"><center>B</center></td>
  </tr>
  <tr>
    <td class="tg-0pky">17-24</td>
    <td class="tg-0pky"><center>C</center></td>
    <td class="tg-dvpl">25-36</td>
    <td class="tg-dvpl"><center>C</center></td>
    <td class="tg-dvpl">41-60</td>
    <td class="tg-dvpl"><center>C</center></td>
  </tr>
    <tr>
    <td class="tg-0pky">0-16</td>
    <td class="tg-0pky"><center>D</center></td>
    <td class="tg-dvpl">0-24</td>
    <td class="tg-dvpl"><center>D</center></td>
    <td class="tg-dvpl">0-40</td>
    <td class="tg-dvpl"><center>D</center></td>
  </tr>
  
</table>
</div>
														</div>
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
		
function gradeheader()
	{
		 var classid = $("#schoolcat").val(); 

		 if (classid <= 5)
		 {
		 $(".d").hide();
	     }
		 else 
		 {
		 $(".d").show();
	     }
	}
$(document).ready(function(){
var classnumber=<?php echo $classname; ?>;
  if (classnumber <= 5)
		 {
		 $(".d").hide();
	     }
		 else 
		 {
		 $(".d").show();
	     }	

var status='';	
var gradedetails = <?php echo json_encode($gradetable, JSON_PRETTY_PRINT)?>;
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

  }); 


        
     
function save(classid) {
  var table = $('#example-table').tableToJSON(); // Convert the table into a javascript object
  
  var classname = <?php echo json_encode($classname, JSON_PRETTY_PRINT)?>;
  var value=(JSON.stringify(table));
  
  
				$.ajax(
				{
					data:{'records':value,'classid':classname},
					url:baseurl+'Home/emis_school_grade_table_add',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{
						
						 
						 swal("OK", "School Grade Saved Successfully", "success");
						 window.location.reload();
						
					}
				});
  
}
function update()
{
  var table = $('#example-table').tableToJSON(); // Convert the table into a javascript object
  
  var value=(JSON.stringify(table));
  
    var classid = $("#classid").val();
	
				$.ajax(
				{
					data:{'records':value,'classid':classid},
					url:baseurl+'Home/emis_school_grade_table_update',
					type:"POST",
					dataType:"JSON",
					success:function(res)
					{ 
						 swal("OK", "School Grade Update Successfully", "success");
						 window.location.reload();
						
					}
				});
}
function finalsave()
 {
	 var table = $('#example-table').tableToJSON(); // Convert the table into a javascript object
     var value=(JSON.stringify(table));
     var classid = $("#classid").val();
   swal({
        title: "Are you sure?",
        text: "Do you want to Final Submit? Entries Can't Be Changed !",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ff0000",
        confirmButtonText: "Yes, Final Submit!",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
   }, function(isConfirm){
    if (isConfirm)
				$.ajax(
				{
					data:{'records':value,'classid':classid},
					url:baseurl+'Home/emis_school_grade_table_update_final',
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
	
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}      

        </script>
    </body>
</html>