<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
	<!--.select2-container--bootstrap .select2-results__option--highlighted[aria-selected]{
		font-size:11px !important;-->
	 <style>
	
		.select2-container--bootstrap .select2-results>.select2-results__options {
		font-size:11px !important;
		color:green !important;
		
	}
 </style>
 <style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color:#DEB887;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 14px;
  color:white;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #BC8F8F;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>
 
    <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
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
                            
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
                            <div class="page-content">
                               
                                <div class="container" style="width:1286px;">
                                    <!-- BEGIN PAGE CONTENT INNER -->
                          

                                   
                                       
                                    <!--<?php $this->load->view('emis_school_profile_header1.php'); ?>-->
                                        

                                           <!-- <div class="m-heading-1 border-green m-bordered">
                                            <h3>Basic Information</h3>
                                        </div> -->
                                     
                                     
											 
                                               
                                            </div>
                                               <!--BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                          <div class="caption">
                                                            <i class="fa fa-globe"></i> &nbsp;&nbsp;&nbsp;Week-Wise Teacher Report :&nbsp;&nbsp;
															</div> 
                                                        <div class="tools" style="margin-top: 20px;"> </div>
                                                    </div>
                                                    <div class="portlet-body">
													<form id="save" >
													<div class="row">
													<style>
td{text-align: center}
th{text-align: center}
td(text-overflow: ellipsis}
.center 
{
text-align: center!important;
}
.select2-container--bootstrap .select2-results__option[aria-selected=true] {
    background-color: #f6f681 !important;
    color: #262626;
	font-size:20px;
}

.select2-container--bootstrap {
    display: block;
    width: auto !important;
}
</style>	
													
	                
                                                   

<style>
 {font-family: Helvetica Neue, Arial, sans-serif; }

body { background-image: linear-gradient(#aaa 25%, #000);}

h1, table { text-align: center; }

table {border-collapse: collapse;  width: 70%; margin: 0 auto 5rem;}

th, td { padding: 1.5rem; font-size: 1.1rem; }



tr, td { transition: .4s ease-in; } 


td:empty {background: hsla(50, 25%, 60%, 0.7); }

tr:hover:not(#firstrow), tr:hover td:empty {background: #DEB887; pointer-events: visible;}


</style>																	
														

															</div>
<div class="row">
<div class=" col-md-11">
<table class="tg" style="width:90%;" border="1">
  <tr>
    <th  colspan="17" style="background-color:green; color:white; font-size:12px;padding:7px;">NO.OF PERIOD TAKEN PER WEEK 
	(School Teachers)</th>
  </tr>
  <tr>
    <th style="background-color:lightblue; text-align: left; font-size:15px; font-family:serif;padding:7px;">Teacher Name</th>
	<?php 
	foreach($weekdate as   $wd){
		?>
    <th style="background-color:lightblue; font-size:15px; font-family:serif; padding:7px;"><?php echo $wd->month ?><br>WK - <?php echo $wd->week ?><br>(<?php echo $fromdate=date_format(date_create_from_format('Y-m-d', $wd->Firstdate), 'd') ?>-<?php echo $lastdate=date_format(date_create_from_format('Y-m-d', $wd->lastdate), 'd') ?>)</th>
	<?php
	}
	
?>	
  <th style="background-color:lightblue; text-align: left; font-size:15px; font-family:serif;padding:7px;">Total</th>
  </tr>
 <tbody>
 
                              
                              <?php if(!empty($weekwiseteachercount) ){
								   
								  
								  $i=1;foreach($weekwiseteachercount as $key =>  $wwtc){
                                   
									 ?>
									 
                                  <tr>
                                  
                                      <td style="text-align:left;"><strong><?php  echo($key); ?></strong></td>
									  
                                 	<?php $tot1=''; ?>	 
                                     <?php for ($x = 0; $x < $totalweek; $x++) {
                                    $tot1=$tot1+$wwtc[$x]['count']; ?>
																		 
                                      <td <?php if($wwtc[$x]['count']>28){ ?>
									  
										  
										  style="color:green;"
										  <?php  } else { ?>
										style="color:red;"
									 
                                   <?php										
									  }
									  ?>><strong><?php echo($wwtc[$x]['count'].'</br>' ); ?></strong></td>
									   
									  <?php
									  }
									  
									?>
									<td><?php echo $tot1 ?></td>
									</tr> 
									 <?php
									  
                                      }
									  
							  }					  
                                        ?>
										

                                    
                                                          
                                                            
                              
                         
                            </tbody>
</table>
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
               
                  <?php $this->load->view('footer.php'); ?>
              </div>
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
		

$(document).ready(function(){ 
var timetabledetailsm = <?php echo json_encode($timetabledetails_monday, JSON_PRETTY_PRINT)?>;
console.log(timetabledetailsm);
var timetabledetailst = <?php echo json_encode($timetabledetails_tuesday, JSON_PRETTY_PRINT)?>;

var timetabledetailsw = <?php echo json_encode($timetabledetails_wednesday, JSON_PRETTY_PRINT)?>;
console.log(timetabledetailsw); 
var timetabledetailsth = <?php echo json_encode($timetabledetails_thursday, JSON_PRETTY_PRINT)?>; 
var timetabledetailsf = <?php echo json_encode($timetabledetails_friday, JSON_PRETTY_PRINT)?>; 


var timetabledetailssa = <?php echo json_encode($timetabledetails_saturday, JSON_PRETTY_PRINT)?>; 
var timetabledetailssu = <?php echo json_encode($timetabledetails_sunday, JSON_PRETTY_PRINT)?>; 
var length=timetabledetailsm.length;

if(timetabledetailsm!='')	
{
 var periodscount=$("#periodscount").val();
 for (var i = 1; i <= periodscount; i++) 
 {
	 
 ms=timetabledetailsm[i-1]['PS'];
 mt=timetabledetailsm[i-1]['PT'];
 if(ms=='' && mt=='')
 {
 var leave_dropm = '<select name="leave" class="form-control" id="leave">';
 leave_dropm += '<option value=0>Leave</option>';
 leave_dropm +='</select>';
 $("#mpid"+i).empty('');            
 $("#mpid"+i).html(leave_dropm);
 $("#mpid"+i).prop("disabled", true);
 document.getElementById("m"+i).style.backgroundColor ="#EBF51F";
 }
 else if(ms==null && mt==0 || ms==999 && mt==0)
 {
	 document.getElementById("m"+i).style.backgroundColor ="#fff";
 }
 
 else
 {
 mst=mt+'-'+ms;
 $("#mpid"+i).val(mst);
 document.getElementById("m"+i).style.backgroundColor ="#2c730059"; 
 }
 ts=timetabledetailst[i-1]['PS'];
 tt=timetabledetailst[i-1]['PT'];
 if(ts=='' && tt=='')
 {
 var leave_drop = '<select name="leave" class="form-control form_border" id="leave">';
 leave_drop += '<option value=0>Leave</option>';
 leave_drop +='</select>';
 $("#tpid"+i).empty('');            
 $("#tpid"+i).html(leave_drop);
 $("#tpid"+i).prop("disabled", true);
 document.getElementById("t"+i).style.backgroundColor ="#EBF51F";
 }
 else if(ts==null && tt==0 || ts==999 && tt==0)
 {
	 document.getElementById("t"+i).style.backgroundColor ="#fff";
 }
 else
 {
 tst=tt+'-'+ts;
 $("#tpid"+i).val(tst);
 document.getElementById("t"+i).style.backgroundColor ="#2c730059";
 }
 ws=timetabledetailsw[i-1]['PS'];
 wt=timetabledetailsw[i-1]['PT'];
 if(ws=='' && wt=='')
 {
 var leave_drop = '<select name="leave" class="form-control form_border" id="leave">';
 leave_drop += '<option value=0>Leave</option>';
 leave_drop +='</select>';
 $("#wpid"+i).empty('');            
 $("#wpid"+i).html(leave_drop);
$("#wpid"+i).prop("disabled", true);
document.getElementById("w"+i).style.backgroundColor ="#EBF51F";
 }
 else if(ws==null && wt==0 || ws==999 && wt==0)
 {
	 document.getElementById("w"+i).style.backgroundColor ="#fff";
 }
 else
 {
 wst=wt+'-'+ws;
 $("#wpid"+i).val(wst);
 document.getElementById("w"+i).style.backgroundColor ="#2c730059";
 }
 
 ths=timetabledetailsth[i-1]['PS'];
 tht=timetabledetailsth[i-1]['PT'];
 if(ths=='' && tht=='')
 {
 var leave_drop = '<select name="leave" class="form-control form_border" id="leave">';
 leave_drop += '<option value=0>Leave</option>';
 leave_drop +='</select>';
 $("#thpid"+i).empty('');            
 $("#thpid"+i).html(leave_drop);
$("#thpid"+i).prop("disabled", true);
document.getElementById("th"+i).style.backgroundColor ="#EBF51F";
 }
  else if(ths==null && tht==0 || ths==999 && tht==0)
 {
	 document.getElementById("th"+i).style.backgroundColor ="#fff";
 }
 else
 {
 thst=tht+'-'+ths;
 $("#thpid"+i).val(thst);
 document.getElementById("th"+i).style.backgroundColor ="#2c730059";
 }
 
fs=timetabledetailsf[i-1]['PS'];
 ft=timetabledetailsf[i-1]['PT'];
 if(fs=='' && ft=='')
 {
 var leave_drop = '<select name="leave" class="form-control form_border" id="leave">';
 leave_drop += '<option value=0>Leave</option>';
 leave_drop +='</select>';
 $("#fpid"+i).empty('');            
 $("#fpid"+i).html(leave_drop);
$("#fpid"+i).prop("disabled", true);
document.getElementById("f"+i).style.backgroundColor ="#EBF51F";
 }
 else if(fs==null && ft==0 || fs==999 && ft==0)
 {
	 document.getElementById("f"+i).style.backgroundColor ="#fff";
 }
 else
 {
 fst=ft+'-'+fs;
 $("#fpid"+i).val(fst);
 document.getElementById("f"+i).style.backgroundColor ="#2c730059";
 }
 
sas=timetabledetailssa[i-1]['PS'];
 sat=timetabledetailssa[i-1]['PT'];
 if(sas=='' && sat=='')
 {
 var leave_drop = '<select name="leave" class="form-control form_border" id="leave">';
 leave_drop += '<option value=0>Leave</option>';
 leave_drop +='</select>';
 $("#sapid"+i).empty('');            
 $("#sapid"+i).html(leave_drop);
$("#sapid"+i).prop("disabled", true);
document.getElementById("sa"+i).style.backgroundColor ="#EBF51F";
 }
 else if(sas==null && sat==0 || sas==999 && sat==0)
 {
	 document.getElementById("sa"+i).style.backgroundColor ="#fff";
 } 
 else
 {
 sast=sat+'-'+sas;
 $("#sapid"+i).val(sast);
 document.getElementById("sa"+i).style.backgroundColor ="#2c730059";
 }

sus=timetabledetailssu[i-1]['PS'];
 sut=timetabledetailssu[i-1]['PT'];
 if(sus=='' && sut=='')
 {
 var leave_drop = '<select name="leave" class="form-control form_border" id="leave">';
 leave_drop += '<option value=0>Leave</option>';
 leave_drop +='</select>';
 $("#supid"+i).empty('');            
 $("#supid"+i).html(leave_drop);
$("#supid"+i).prop("disabled", true);
document.getElementById("su"+i).style.backgroundColor ="#EBF51F";
 }
 else if(sus==null && sut==0 || sus==999 && sut==0)
 {
	 document.getElementById("su"+i).style.backgroundColor ="#fff";
 }
 else
 {
 sust=sut+'-'+sus;
 $("#supid"+i).val(sust);
 document.getElementById("su"+i).style.backgroundColor ="#2c730059";
 }
 $("#mpid"+i).select2({closeOnSelect:false});
 $("#tpid"+i).select2({closeOnSelect:false});
 $("#wpid"+i).select2({closeOnSelect:false});
 $("#thpid"+i).select2({closeOnSelect:false});
 $("#fpid"+i).select2({closeOnSelect:false});
 $("#sapid"+i).select2({closeOnSelect:false});
 $("#supid"+i).select2({closeOnSelect:false});
}
}
else
{
	var periodscount=$("#periodscount").val();

for (var i = 1; i <= periodscount; i++) { 

 $("#mpid"+i).select2({closeOnSelect:false});
 $("#tpid"+i).select2({closeOnSelect:false});
 $("#wpid"+i).select2({closeOnSelect:false});
 $("#thpid"+i).select2({closeOnSelect:false});
 $("#fpid"+i).select2({closeOnSelect:false});
 $("#sapid"+i).select2({closeOnSelect:false});
 $("#supid"+i).select2({closeOnSelect:false});
 }
}
			
 });
function copylastweek()	
{
var copypreviousweek_monday = <?php echo json_encode($copypreviousweek_monday, JSON_PRETTY_PRINT)?>;
console.log(copypreviousweek_monday);
var copyprevoiusweek_tuesday = <?php echo json_encode($copyprevoiusweek_tuesday, JSON_PRETTY_PRINT)?>; 
var copypreviousweek_wednesday = <?php echo json_encode($copypreviousweek_wednesday, JSON_PRETTY_PRINT)?>; 
var copypreviousweek_thursday = <?php echo json_encode($copypreviousweek_thursday, JSON_PRETTY_PRINT)?>; 
var copypreviousweek_friday = <?php echo json_encode($copypreviousweek_friday, JSON_PRETTY_PRINT)?>; 
var copypreviousweek_saturday = <?php echo json_encode($copypreviousweek_saturday, JSON_PRETTY_PRINT)?>; 
var copypreviousweek_sunday = <?php echo json_encode($copypreviousweek_sunday, JSON_PRETTY_PRINT)?>; 
if(copypreviousweek_monday!='')	
{
var periodscount=$("#periodscount").val();

for (var i = 1; i <= periodscount; i++) { 

 ms = copypreviousweek_monday[i-1]['PS'];
 mt = copypreviousweek_monday[i-1]['PT'];
 
 //leavedatem = timetabledetailsm[i-1]['leavedate'];
 if(ms=='' && mt=='')
 {
 var leave_dropm = '<select name="leave" class="form-control" id="leave">';
 leave_dropm += '<option value=0>Leave</option>';
 leave_dropm +='</select>';
 $("#mpid"+i).empty('');            
 $("#mpid"+i).html(leave_dropm);
 $("#mpid"+i).prop("disabled", true);
 }
 else if(ms==null && mt==0 || ms==999 && mt==0)
 {
	 document.getElementById("m"+i).style.backgroundColor ="#EF6E7A";
 }
 else
 {
 mst=mt+'-'+ms;
 $("#mpid"+i).val(mst);
 document.getElementById("m"+i).style.backgroundColor ="#59EB1E";
 }
 ts = copyprevoiusweek_tuesday[i-1]['PS'];
 tt = copyprevoiusweek_tuesday[i-1]['PT'];
 if(ts=='' && ts=='')
 {
 var leave_drop = '<select name="leave" class="form-control" id="leave">';
 leave_drop += '<option value=0>Leave</option>';
 leave_drop +='</select>';
 $("#tpid"+i).empty('');            
 $("#tpid"+i).html(leave_drop);
 $("#tpid"+i).prop("disabled", true);
 document.getElementById("t"+i).style.backgroundColor ="#EBF51F";
 }
 else if(ts==null && tt==0 || ts==999 && tt==0)
 {
	 document.getElementById("t"+i).style.backgroundColor ="#EF6E7A";
 }
 else
 {
 tst=tt+'-'+ts;
 $("#tpid"+i).val(tst);
 document.getElementById("t"+i).style.backgroundColor ="#59EB1E";
 }
 ws = copypreviousweek_wednesday[i-1]['PS'];
 wt = copypreviousweek_wednesday[i-1]['PT'];
 if(ws=='' && wt=='')
 {
 var leave_drop = '<select name="leave" class="form-control" id="leave">';
 leave_drop += '<option value=0>Leave</option>';
 leave_drop +='</select>';
 $("#wpid"+i).empty('');            
 $("#wpid"+i).html(leave_drop);
$("#wpid"+i).prop("disabled", true);
document.getElementById("w"+i).style.backgroundColor ="#EBF51F";
 }
 else if(ws==null && wt==0 || ws==999 && wt==0)
 {
	 document.getElementById("w"+i).style.backgroundColor ="#EF6E7A";
 }
 else
 {
 wst=wt+'-'+ws;
 $("#wpid"+i).val(wst);
 document.getElementById("w"+i).style.backgroundColor ="#59EB1E";
 }
 
 ths = copypreviousweek_thursday[i-1]['PS'];
 tht = copypreviousweek_thursday[i-1]['PT'];
 if(ths=='' && tht=='')
 {
 var leave_drop = '<select name="leave" class="form-control" id="leave">';
 leave_drop += '<option value=0>Leave</option>';
 leave_drop +='</select>';
 $("#thpid"+i).empty('');            
 $("#thpid"+i).html(leave_drop);
$("#thpid"+i).prop("disabled", true);
document.getElementById("th"+i).style.backgroundColor ="#EBF51F";
 }
  else if(ths==null && tht==0 || ths==999 && tht==0)
 {
	 document.getElementById("th"+i).style.backgroundColor ="#EF6E7A";
 }
 else
 {
 thst=tht+'-'+ths;
 $("#thpid"+i).val(thst);
 document.getElementById("th"+i).style.backgroundColor ="#59EB1E";
 }
 fs = copypreviousweek_friday[i-1]['PS'];
 ft = copypreviousweek_friday[i-1]['PT'];
 if(fs=='' && ft=='')
 {
 var leave_drop = '<select name="leave" class="form-control" id="leave">';
 leave_drop += '<option value=0>Leave</option>';
 leave_drop +='</select>';
 $("#fpid"+i).empty('');            
 $("#fpid"+i).html(leave_drop);
$("#fpid"+i).prop("disabled", true);
document.getElementById("f"+i).style.backgroundColor ="#EBF51F";
 }
 else if(fs==null && ft==0 || fs==999 && ft==0)
 {
	 document.getElementById("f"+i).style.backgroundColor ="#EF6E7A";
 }
 else
 {
 fst=ft+'-'+fs;
 $("#fpid"+i).val(fst);
 document.getElementById("f"+i).style.backgroundColor ="#59EB1E";
 }
 sas = copypreviousweek_saturday[i-1]['PS'];
 sat = copypreviousweek_saturday[i-1]['PT'];
 if(sas=='' && sat=='')
 {
 var leave_drop = '<select name="leave" class="form-control" id="leave">';
 leave_drop += '<option value=0>Leave</option>';
 leave_drop +='</select>';
 $("#sapid"+i).empty('');            
 $("#sapid"+i).html(leave_drop);
$("#sapid"+i).prop("disabled", true);
document.getElementById("sa"+i).style.backgroundColor ="#EBF51F";
 }
 else if(sas==null && sat==0 || sas==999 && sat==0)
 {
	 document.getElementById("sa"+i).style.backgroundColor ="#EF6E7A";
 } 
 else
 {
 sast=sat+'-'+sas;
 $("#sapid"+i).val(sast);
 document.getElementById("sa"+i).style.backgroundColor ="#59EB1E";
 }
 sus = copypreviousweek_sunday[i-1]['PS'];
 sut = copypreviousweek_sunday[i-1]['PT'];
 if(sus=='' && sut=='')
 {
 var leave_drop = '<select name="leave" class="form-control" id="leave">';
 leave_drop += '<option value=0>Leave</option>';
 leave_drop +='</select>';
 $("#supid"+i).empty('');            
 $("#supid"+i).html(leave_drop);
$("#supid"+i).prop("disabled", true);
document.getElementById("su"+i).style.backgroundColor ="#EBF51F";
 }
 else if(sus==null && sut==0 || sus==999 && sut==0)
 {
	 document.getElementById("su"+i).style.backgroundColor ="#EF6E7A";
 }
 else
 {
 sust=sut+'-'+sus;
 $("#supid"+i).val(sust);
 document.getElementById("su"+i).style.backgroundColor ="#59EB1E";
 }
 
  $("#mpid"+i).select2({closeOnSelect:false});
 $("#tpid"+i).select2({closeOnSelect:false});
 $("#wpid"+i).select2({closeOnSelect:false});
 $("#thpid"+i).select2({closeOnSelect:false});
 $("#fpid"+i).select2({closeOnSelect:false});
 $("#sapid"+i).select2({closeOnSelect:false});
 $("#supid"+i).select2({closeOnSelect:false});
}

}
else
{
	swal("OK", "No Data Available", "success");
}

}



function save()
{
	var Monday=[];
	
	var Tuesday=[];
	var Wednesday=[];
	var Thursday=[];
	var Friday=[];
	var Saturday=[];
	var Sunday=[];
	var periodscount=$("#periodscount").val();
	var term=$("#term").val();
	var classes=$("#class").val();
	var section =$("#sections").val();
	var classautoid =$("#clautoid").val();
	for (var i = 1; i <= periodscount; i++) { 
	monday=$("#mpid"+i).val();
	tuesday=$("#tpid"+i).val();
	wednesday=$("#wpid"+i).val();
	thursday=$("#thpid"+i).val();
	friday=$("#fpid"+i).val();
	saturday=$("#sapid"+i).val();
	sunday=$("#supid"+i).val();
	Monday[i] =monday;
	Tuesday[i] =tuesday;
	Wednesday[i] =wednesday;
	Thursday[i] =thursday;
	Friday[i] =friday;
	Saturday[i] =saturday;
	Sunday[i] =sunday;
	}
	$.ajax(
				{
					data:{'classautoid':classautoid,'periodscount':periodscount,'term':term,'class':classes,'section':section,'monday':Monday,'tuesday':Tuesday,'wednesday':Wednesday,'thursday':Thursday,'friday':Friday,'saturday':Saturday,'sunday':Sunday},
					url:baseurl+'TimetableController/loadWeeklyTimeTable',
					type:"POST",
					dataType:"JSON",
					if(res)
					{ 
						 swal("OK", "Weekly Time Table Saved Successfully", "success");
						 window.location.reload();
						
					}
				});
				swal("OK", "Weekly Time Table Saved Successfully", "success");
				window.location.reload();
	
}
    function get_section()
    {
  // alert(section_id);
  var classid=$("#classid").val();
      if(classid !=0){
    $.ajax(
    {
        type: "POST",
        url:baseurl+'TimetableController/get_school_section_details',
        data:{'class_id':classid},
        success: function(resp){
        // alert(resp);  
       
        var section = JSON.parse(resp);
        console.log(section);
        var section_drop = '<select name="section_id" class="form-control" id="section_id">';
		
        section_drop += '<option value=0>Select Section</option>';
        $.each(section,function(id,val)
        {
            section_drop +='<option value='+ val.section +'>'+val.section+'</option>';
			class_id=val.id;
			 $('#classauto').val(class_id);
        })
            section_drop +='</select>';
            
            $("#section").empty('');            
            $("#section").html(section_drop);
         },
          
    })
    }
    }  
        
 

</script>    

    </body>
</html>