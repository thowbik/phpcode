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
                                                    <span class="caption-subject font-dark sbold uppercase">Co-Scholastic Achievement of Children</span>
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
                                                  <form method="post" action="<?php echo base_url().'Home/emis_school_co_scholostic';?>">
												   
                                                    <div class="form-group">
                                                    <div class="row">
                                                       <div class="col-md-3">  
                                                          <select style="width: 69%;" class="form-control" data-placeholder="Choose a Category" tabindex="1" id="schoolcat" name="schoolcate"  style="width: 60%" required="">
                                                               	
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
													
													 <th style="padding-left: 825px">No.of children Scoring grades</th>
                                                   	
												</tr>												
												</table>		 
                                                        <table class="table table-striped table-bordered table-hover" id='scholostic-table' border="3" style="margin-top: -21px;">
														<style>
td{text-align: center}
th{text-align: center}
</style>
                                              
                                                            <tbody>
<tr>
<td contentEditable="false"  rowspan="2" style="color:green; width:15%;"><strong>Type</strong></td>
<td contentEditable="false" rowspan="2" style="color:green; width:15%;"><strong>SUBJECT</strong></td>
<td  contentEditable="false" rowspan="2" style="color:green; width:20%;"><strong>COMMUNITY</strong></td>
<td  contentEditable="false" rowspan="2" style="color:green; width:10%;"><strong>NO.ENROLLED</strong></td>
<td  contentEditable="false" rowspan="2" style="color:green; width:10%;"><strong>NO.ASSESSED</strong></td>
<td style="display:none;">ID</td>
<td style="display:none;">A</td>
<td style="display:none;">B</td>
<td style="display:none;">C</td>

</tr>
<tr>

<th style="display:none;" contentEditable="false"><strong>ID</strong></th>
<th style="color:green" contentEditable="false"><strong>A</strong></th>
<th style="color:green" contentEditable="false"><strong>B</strong></th>
<th style="color:green" contentEditable="false"><strong>C</strong></th>

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
$SC=$SC1+$SC2;

$ST=$communitycount[3]->c;

$TOTAL=$others+$SC+$ST;
?>
 
<td contentEditable="false" rowspan="3"><strong>SCHOLASTIC</strong></td>	 
<td contentEditable="false" rowspan="3"><strong>Physical <br> Education</strong></td>
<td contentEditable="false"><strong>SC</strong></td>
<td contentEditable="false" ><?=$SC?></td>
<td  id="as1" contentEditable="true"  onKeypress="return isNumberKey(event);";><?=$gradetable_sc[0]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_sc[0]->id;?></td>

<td  contentEditable="true"  onKeypress="return isNumberKey(event);"><?=$gradetable_sc[0]->FA;?></td>
<td  contentEditable="true"  onKeypress="return isNumberKey(event);";><?=$gradetable_sc[0]->FB;?></td>
<td  contentEditable="true"  onKeypress="return isNumberKey(event);";><?=$gradetable_sc[0]->FC;?></td>

</tr>
<tr>
<td  contentEditable="false"><strong>ST</strong></td>
<td  contentEditable="false"><?=$ST;?></td>
<td  id="as2" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[1]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_sc[1]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[1]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[1]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[1]->FC;?></td>

</tr>
<tr >
<td >
<p contentEditable="false"><strong>OTHERS</strong></p>
<p contentEditable="false"><strong>MBC,BC,OC,DNC</strong></p>
</td>
<td contentEditable="false"><?=$others;?></td>
<td  id="as3"  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[2]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_sc[2]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[2]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[2]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[2]->FC;?></td>

</tr>
<!--<tr style="background-color:lightblue;">
<td contentEditable="false"><strong>TOTAL</strong></td>
<td  contentEditable="true" contentEditable="false"><?=$TOTAL;?></td>
<td  id="ta" contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[3]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_sc[3]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[3]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[3]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[3]->FC;?></td>

</tr>-->
<tr >
<td contentEditable="false" rowspan="12"><strong>CO SCHOLASTIC</strong></td>	
<td contentEditable="false" rowspan="3"><strong>Life  Skill</strong></td>
<td contentEditable="false"><strong>SC</strong></td>
<td contentEditable="false" ><?=$SC;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[3]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_sc[3]->id;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[3]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[3]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[3]->FC;?></td>

</tr>
<tr >
<td contentEditable="false"><strong>ST</strong></td>
<td contentEditable="false"><?=$ST;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[4]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_sc[4]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[4]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[4]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[4]->FC;?></td>

</tr>
<tr >
<td >
<p contentEditable="false"><strong>OTHERS</strong></p>
<p contentEditable="false"><strong>MBC,BC,OC,DNC</strong></p>
</td>
<td contentEditable="false"><?=$others;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[5]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_sc[5]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[5]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[5]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[5]->FC;?></td>

</tr>
<!--<tr style="background-color:lightblue;">
<td contentEditable="false"><strong>TOTAL</strong></td>
<td  contentEditable="false"><?=$TOTAL;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[7]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_sc[7]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[7]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[7]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[7]->FC;?></td>

</tr>-->
<tr>

<td contentEditable="false" rowspan="3"><strong>Attitudes & Values</strong>
<p>&nbsp;</p>
</td>
<td contentEditable="false"><strong>SC</strong></td>
<td contentEditable="false" ><?=$SC;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[6]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_sc[6]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[6]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[6]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[6]->FC;?></td>

</tr>
<tr>
<td contentEditable="false"><strong>ST</strong></td>
<td contentEditable="false"><?=$ST;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[7]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_sc[7]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[7]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[7]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[7]->FC;?></td>

</tr>
<tr>
<td>
<p contentEditable="false"><strong>OTHERS</strong></p>
<p contentEditable="false"><strong>MBC,BC,OC,DNC</strong></p>
</td>
<td contentEditable="false"><?=$others;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[8]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_sc[8]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[8]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[8]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[8]->FC;?></td>

</tr>
<!--<tr style="background-color:lightblue;">
<td contentEditable="false"><strong>TOTAL</strong></td>
<td  contentEditable="false"><?=$TOTAL;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[11]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_sc[11]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[11]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[11]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[11]->FC;?></td>

</tr>-->
<tr >

<td  rowspan="3"><strong>Health & Yoga</strong>
<p>&nbsp;</p>
</td>
<td contentEditable="false"><strong>SC</strong></td>
<td contentEditable="false" ><?=$SC;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[9]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_sc[9]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[9]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[9]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[9]->FC;?></td>

</tr>
</tr>
<tr>
<td contentEditable="false"><strong>ST</strong></td>
<td contentEditable="false"><?=$ST;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[10]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_sc[10]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[10]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[10]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[10]->FC;?></td>

</tr>
<tr>
<td>
<p contentEditable="false"><strong>OTHERS</strong></p>
<p contentEditable="false"><strong>MBC,BC,OC,DNC</strong></p>
</td>
<td contentEditable="false"><?=$others;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[11]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_sc[11]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[11]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[11]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[11]->FC;?></td>

</tr>
<!--<tr style="background-color:lightblue;">
<td contentEditable="false"><strong>TOTAL</strong></td>
<td  contentEditable="false"><?=$TOTAL;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[15]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_sc[15]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[15]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[15]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[15]->FC;?></td>

</tr>-->
<tr>

<td  contentEditable="false" rowspan="3"><strong>Co-Curricular</strong></td>
<td contentEditable="false"><strong>SC</strong></td>
<td contentEditable="false" ><?=$SC;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[12]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_sc[12]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[12]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[12]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[12]->FC;?></td>

</tr>
<tr>
<td contentEditable="false"><strong>ST</strong></td>
<td contentEditable="false"><?=$ST;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[13]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_sc[13]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[13]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[13]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[13]->FC;?></td>

</tr>
<tr>
<td >
<p contentEditable="false"><strong>OTHERS</strong></p>
<p contentEditable="false"><strong>MBC,BC,OC,DNC</strong></p>
</td>
<td contentEditable="false"><?=$others;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[14]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_sc[14]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[14]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[14]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[14]->FC;?></td>

</tr>
<!--<tr style="background-color:lightblue;">
<td contentEditable="false"><strong >TOTAL</strong></td>
<td style="background-color:lightblue" contentEditable="false"><strong><?=$TOTAL;?></strong></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[19]->assessed;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);" style="display:none;"><?=$gradetable_sc[19]->id;?></td>

<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[19]->FA;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[19]->FB;?></td>
<td  contentEditable="true" onKeypress="return isNumberKey(event);";><?=$gradetable_sc[19]->FC;?></td>

</tr>-->

</tbody>
															
                                                        </table>
														</div>
														<br>
														<br>
														<br>
														 <div class="row">
														 <?php
														
														 $status=$gradetable_sc[1]->status;
												
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
	$("#as1").prop('maxLength', 6);
var status='';	
var gradedetails = <?php echo json_encode($gradetable_sc, JSON_PRETTY_PRINT)?>;
if(gradedetails.length !=0){
 status=gradedetails[0].status;
 }else
 {
	 status = 0;
 }
if(status==3)
{
// $('#example-table').attr("contentEditable", "false");
 $("#save").hide();
 $("#final").hide();
}

  }); 


        
     
function save() {
  var table = $('#scholostic-table').tableToJSON(); // Convert the table into a javascript object
  
  var value=(JSON.stringify(table));
  var classname = <?php echo json_encode($classname, JSON_PRETTY_PRINT)?>;
  
				$.ajax(
				{
					data:{'records':value,'classid':classname},
					url:baseurl+'Home/emis_school_co_scholostic_add',
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
  var table = $('#scholostic-table').tableToJSON();

  // Convert the table into a javascript object
  var value=(JSON.stringify(table));
    var classid = $("#classid").val();
				$.ajax(
				{
					data:{'records':value,'classid':classid},
					url:baseurl+'Home/emis_school_co_scholostic_update',
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
	var table = $('#scholostic-table').tableToJSON(); // Convert the table into a javascript object
   var value=(JSON.stringify(table));
   var classid = $("#classid").val();
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
					data:{'records':value,'classid':classid},
					url:baseurl+'Home/emis_school_co_scholostic_update_final',
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
//totalassessed=0;	
function isNumberKey(evt){
	var as1= parseInt($("#as1").text());
	//alert
	var as2= parseInt($("#as2").text());
	var totalassessed = parseInt(as1 + as2);
	//alert(totalassessed);
	 //$("#as3").text(totalassessed);
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}      

       
               
               //emis_no_sections
               
            
      

        </script>



    </body>

</html>