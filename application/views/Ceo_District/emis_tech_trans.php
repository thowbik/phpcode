<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
    
    <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css';?>" rel="stylesheet" type="text/css" />
 
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL STYLES -->
    
       
        <!-- END PAGE LEVEL STYLES -->

        </head>
    <!-- END HEAD -->
    <style type="text/css">
            label.error { float: left; color:#dd4b39;padding-left: 5%; }
             .note{color:#dd4b39; }
         </style>

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            
    <?php  
     $this->load->view('Ceo_District/header.php');?>

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
                                        <h1>Teacher Transfer
                                            <!-- <small>Transfer</small> -->
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
                                     <center>   
                                   <?php /* ?><?php $this->load->view('district/emis_district_profile_header.php'); ?> <?php */ ?>
                                        </center>

                                       <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Teacher Transfer</span>
                                                </div>
                                            </div>

                                           <div class="portlet-body">
                                           <div class="row">
                                            <div class="col-md-12">
                                                    <form  method="post" id="tech_trans_frm">
                                            
                                                <div class="col-md-6 thumbnail"><center>
                                                    <div class="form-group panel-heading" style="background-color: #32c5d2;color: #fff;">
                                                    <label class="control-label"><b>Present School</b></label>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        
                                                        <div class="col-md-2">
                                                            <label class="pull-left">District</label>    
                                                        </div>
														<!--,getdst_anthr(this.value)-->
                                                        <div class="col-md-10">
                                                            <select class="form-control" style="width: 90%;" onchange="getdst(this.value)" name="o_dist" id="o_dist">
                                                                <option value="">Select the District</option>
                                                                <?php if(isset($get_dist_dtls)){  foreach($get_dist_dtls as $dist){?>            
                                                                <option value="<?php echo $dist->district_id; ?>"><?php echo $dist->district_name; ?></option>
                                                                <?php }}?>
                                                            </select>    
                                                        </div>
                                                    </div>
                                                    
                                                    <br><br>
                                                    <div class="form-group" style="margin-top: 1%;">
                                                        <div class="col-md-2">
                                                            <label class="pull-left">Block </label>    
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select class="form-control" style="width: 90%;" id="blockdtl" onchange="get_schl(this.value)" name="t_block">
                                                            <option value="">Block</option>
                                               
                                                        </select>    
                                                        </div>
                                                        
                                                    </div>
                                                    <br><br>
                                                    <div class="form-group">
                                                        <div class="col-md-2">
                                                            <label class="pull-left">School</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select class="form-control" style="width: 90%;" id="getschl"  name="t_school" onchange="get_schl_key(this.value)">
                                                                <option value="">School</option>
                                                            </select>    
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    <div class="form-group">
                                                        <div class="col-md-2">
                                                            <label class="pull-left">Type of Teacher</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select class="form-control" name ="techtype" style="width: 90%;" id="type_tech" onchange="get_tchr(this.value)">
                                                                       <option value="">Select the Teacher type</option>
                                                                <?php foreach($get_teach_type as $type){?>            
                                                                <option value="<?php echo $type->id; ?>"><?php echo $type->type_teacher; ?></option>
                                                                <?php }?>
                                                            </select>
                                                                     </select>
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    <div class="form-group">
                                                        <div class="col-md-2">
                                                            <label class="pull-left">Teacher</label>    
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select class="form-control" style="width: 90%;" id="gettchr" onchange="tech_nme_only(this.value)" name="t_name">
                                                                <option value="">Teacher Name</option>
                                                            </select>    
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    <div class="form-group">
                                                    <div class="col-md-2">
                                                        <label class="pull-left">Transfer Type</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <select class="form-control" style="width: 90%;" name="t_cat" id="t_cat">
                                                            <option value="">Transfer Type</option>

                                                            <option value="Administrative Transfer">Administrative Transfer</option>
                                                            <option value="General Transfer">General Transfer</option>
                                                            <option value="Offline">Offline</option>
                                                            <option value="Serious Illness">Serious Illness</option>
                                                            <option value="Spouse Death">Spouse Death</option>
                                                            <option value="Deputation">Deputation</option>
                                                            <option value="Promotion">Promotion</option>
                                                            <option value="Deployment">Deployment</option>
                                                            <option value="Others">Others</option>
                                                        </select>
                                                    </div>
                                                    </div>
                                                    <br><br>

                                                    <div class="form-group">
                                                        <div class="col-md-2">
                                                            <label class="pull-left">Remarks</label>    
                                                        </div>
                                                        <div class="col-md-10">
                                                            <textarea class="form-control" style="width: 90%;" name="t_remark" id="t_remark"></textarea>    
                                                        </div>
                                                        
                                                    </div>
                                                    <br><br>
                                                       <br>
                                                       <br>
													   <br><br>
                                                       <br>
                                                       <br>
													   <br><br>
                                                       <br>
                                                      
                                                      

                                                    </center>
                                                </div>

                                                 <!-- <div class="col-md-6 thumbnail" ><center>
                                                   <div class="form-group panel-heading" style="background-color: #32c5d2;color: #fff;">
                                                    <label class="control-label"><b>New School</b></label>
                                                    </div>
                                                    <div class="form-group">
                                                     
                                                         <div class="col-md-2">
                                                            <label class="pull-left">District </label>    
                                                        </div>
                                                         <?php if($usertype== 3) {  ?>


                                                        <div class="col-md-10">
                                                            <p id="showdist" class="pull-left" style="padding-left: 5%;">
                                                                
                                                            </p>
                                                        </div>

                                                      <?php   } else if($usertype== 5) { ?> 
                                                      <div class="col-md-10">
                                                            <select class="form-control" style="width: 90%;" onchange="getdst2(this.value),getdst_anthr2(this.value)" name="n_dist" id="n_dist">
                                                                <option value="">Select the District</option>
                                                                <?php if(isset($get_dist_dtls)){  foreach($get_dist_dtls as $dist){?>            
                                                                <option value="<?php echo $dist->district_id; ?>"><?php echo $dist->district_name; ?></option>
                                                                <?php }}?>
                                                            </select>    
                                                        </div>


                                                      <?php } ?>

                                                    </div>
                                                    <br><br>
                                                    <div class="form-group" style="margin-top: 1%;">
                                                        <div class="col-md-2">
                                                            <label class="pull-left">Block </label>    
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select class="form-control"  style="width: 90%;" id="subblck" onchange="get_another_block(this.value)" name="blocknxt">
                                                            <option value="">Block</option>
                                                        </select>    
                                                        </div>
                                                        
                                                    </div>
                                                    <br><br>
                                                    <div class="form-group">
                                                        <div class="col-md-2">
                                                            <label class="pull-left">School</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select class="form-control" style="width: 90%;" id="anothr_blck_dtls"  name="next_school" onchange="get_school_key(this.value)">
                                                                <option value="">School</option>
                                                            </select>    
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    <div class="form-group">
                                                        <div class="col-md-2">
                                                            <label class="pull-left">Teacher </label>    
                                                        </div>
                                                        <div class="col-md-10">
                                                            <p id="shownme" class="pull-left" style="padding-left: 5%;"></p>
                                                        </div>
                                                    </div>
                                                    <br><br>

                                                    <div class="form-group">
                                                        <div class="col-md-2">
                                                            <label class="pull-left">Designation Type </label>    
                                                        </div>
                                                        <div class="col-md-10">
                                                           
															<select class="form-control" style="width: 90%;" name="techtype1" id="techtype1">
                                                                <option value="">Select the Teacher type</option>
                                                                <?php foreach($get_teach_type as $type){?>            
                                                                <option value="<?php echo $type->id; ?>"><?php echo $type->type_teacher; ?></option>
                                                                <?php }?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    

                                                    <div class="form-group">
                                                        <div class="col-md-2">
                                                            <label class="pull-left">Transfer Date </label>    
                                                        </div>
                                                        <div class="col-md-9" style="margin-left: 22px;">
                                                       
													
													 <div class="input-group date">
   <input type="text" name="transferdate" class="form-control date" id="transferdate" placeholder="D-M-YYYY" />
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
    </div> 
</div>

                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    
													
													  <div class="form-group">
                                                        <div class="col-md-2">
                                                            <label class="pull-left">Transfered By </label>    
                                                        </div>
                                                        <div class="col-md-10">
                                                          
															<select class="form-control" style="width: 90%;" name="trans_by" id="trans_by">
                                                                <option value="">Transfered By</option>
                                                                <?php foreach($transceotypes as $type){?>            
                                                                <option value="<?php echo $type->office_name; ?>"><?php echo $type->office_name; ?></option>
                                                                <?php }?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <br><br>
													
                                                    
                                                    <div class="form-group" style="margin-bottom: 17%;">
                                                       
                                                         <button type="submit" id="emis_staff_transferspl" name="emis_staff_transferspl" class="btn green" onclick="transferteacher();">Transfer <i class="fa fa-arrow-circle-right"></i></button>
                                                    </div>     
                                                    </center>
                                                  
                                                </div>-->
												    <div class="col-md-6 thumbnail" ><center>
                                                   <div class="form-group panel-heading" style="background-color: #32c5d2;color: #fff;">
                                                    <label class="control-label"><b>New School</b></label>
                                                    </div>
                                                    <div class="form-group" style="margin-top: 1%;">
                                                        
                                                         <div class="col-md-2">
                                                            <label class="pull-left" >Currently Deputed?</label>    
                                                        </div>
                                                         
                                                      <div class="col-md-10">
                                        <select class="form-control" style="width: 90%;" id="office" name="office" onchange="
										get_office_district(this.value)" required="required">
                                                       <option value="">Choose</option>
                                                       <option value="1">School</option>
                                                       <option value="2">Office</option>
                                                    </select>
                                        <div id="deputealert" style="color:#dd4b39;"></div>
                                    </div>
                                                    </div>
                                                    <br><br>
                                                    <!--<div class="form-group" style="margin-top: 1%;" id="blk">
                                                        <div class="col-md-2">
                                                            <label class="pull-left">Block </label>    
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select class="form-control"  style="width: 90%;" id="subblck" onchange="get_another_block(this.value)" name="blocknxt">
                                                            <option value="">Block</option>
                                                        </select>    
                                                        </div>
                                                        
                                                    </div> -->
													    <div class="form-group"style="margin-top: 1%;" >
                                                        
                                                        <div class="col-md-2">
                                                            <label class="pull-left">District</label>    
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select class="form-control" style="width: 90%;" onchange="getdst2(this.value)", name="n_dist" id="n_dist">
                                                                <option value="">Select the District</option>
                                                                <?php if(isset($get_dist_dtls)){  foreach($get_dist_dtls as $dist){?>            
                                                                <option value="<?php echo $dist->district_id; ?>"><?php echo $dist->district_name; ?></option>
                                                                <?php }}?>
                                                            </select>    
                                                        </div>
                                                    </div>
                                                    <br><br>
													
													<div class="form-group" style="margin-top: 1%;" >
                                                        <div class="col-md-2">
                                                            <label class="pull-left">Block </label>    
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select class="form-control"  style="width: 90%;" id="subblck" onchange="get_another_block(this.value)" name="blocknxt">
                                                            <option value="">Block</option>
                                                        </select>    
                                                        </div>
                                                        
                                                    </div>
                                                    <br><br>
                                                    <div class="form-group" id="scl">
                                                        <div class="col-md-2">
                                                            <label class="pull-left">School</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select class="form-control" style="width: 90%;" id="anothr_blck_dtls"  name="next_school" onchange="get_school_key(this.value)">
                                                                <option value="">School</option>
                                                            </select>    
                                                        </div>
                                                    </div>
													 <div class="form-group" id="off">
                                                        <div class="col-md-2">
                                                            <label class="pull-left">Office</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <select class="form-control" style="width: 90%;" id="officelist"  name="officelist" onchange="get_school_key(this.value)">
                                                                <option value="">Office list</option>
                                                            </select>    
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    <div class="form-group">
                                                        <div class="col-md-2">
                                                            <label class="pull-left">Teacher </label>    
                                                        </div>
                                                        <div class="col-md-10">
                                                            <p id="shownme" class="pull-left" style="padding-left: 5%;"></p>
                                                        </div>
                                                    </div>
                                                    <br><br>

                                                    <div class="form-group">
                                                        <div class="col-md-2">
                                                            <label class="pull-left">Designation Type </label>    
                                                        </div>
                                                        <div class="col-md-10">
                                                            <!--<p id="design_txt" class="pull-left" style="padding-left: 5%;"></p>-->
															<select class="form-control" style="width: 90%;" name="techtype1" id="techtype1">
                                                                <option value="">Select the Teacher type</option>
                                                                <?php foreach($get_teach_type as $type){?>            
                                                                <option value="<?php echo $type->id; ?>"><?php echo $type->type_teacher; ?></option>
                                                                <?php }?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    

                                                  <div class="form-group">
                                                        <div class="col-md-2">
                                                            <label class="pull-left">Transfer Date </label>    
                                                        </div>
                                                        <div class="col-md-9" style="margin-left: 22px;">
                                                       
													
													 <div class="input-group date">
   <input type="text" name="transferdate" class="form-control date" id="transferdate" placeholder="D-M-YYYY" />
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
    </div> 
</div>

                                                        </div>
                                                    </div>
                                                    <br><br>
													
													  <div class="form-group">
                                                        <div class="col-md-2">
                                                            <label class="pull-left">Transfered By </label>    
                                                        </div>
                                                        <div class="col-md-10">
                                                          
															<select class="form-control" style="width: 90%;" name="trans_by" id="trans_by">
                                                                <option value="">Transfered By</option>
                                                                <?php foreach($transceotypes as $type){?>            
                                                                <option value="<?php echo $type->office_name; ?>"><?php echo $type->office_name; ?></option>
                                                                <?php }?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    
													
                                                    <!-- <input type="text" name="newtxt"> -->
                                                    <div class="form-group" style="margin-bottom: 17%;">
                                                        <!-- <button type="submit" class="btn green" id="emis_stu_searchsep_sub">Transfer <i class="fa fa-arrow-circle-right"></i></button>  -->
                                                         <button type="submit" id="emis_staff_transferspl" name="emis_staff_transferspl" class="btn green" onclick="transferteacher();">Transfer <i class="fa fa-arrow-circle-right"></i></button>
                                                    </div>     
                                                    </center>
                                                   <!--  <p id="schl_key123"></p> -->
                                                </div>
                                                </form>
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
<input type="text" id="schl_key" name="school_key" value="">
                                                    <input type="text" id="hid_school_key" name="old_key_id" value="">
        <?php $this->load->view('scripts.php'); ?>
       
   <script src="<?php echo base_url().'asset/js/district.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/global/plugins/jquery.validate.min.js';?>"></script>

<script src="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js';?>" type="text/javascript"></script>
		

     <script type="text/javascript">
   
   	   $(document).ready(function(){
  $("#off").hide();	
});
   function get_office_district(type){
	   
	   if(type==2)
	   {
		 $("#blk").hide();
         $("#scl").hide();	
         $("#off").show();		 
	    var distid =$("#n_dist").val();
		 // alert(distid);
		
             $.post('<?php echo base_url(); ?>District/get_office/'+distid, function(data) {
              if(data!='')
              {
                 $('#officelist').html(data);
              }
              else
              {
                 $('#officelist').html('');
              }
         }); 
	   }
else
{
        $("#blk").show();
         $("#scl").show();	
         $("#off").hide();	
}	
       }

$.fn.datepicker.defaults.format = "dd-mm-yyyy";
		
$('.date').datepicker({
  
        
    }); 
	

 // $('#fdate').datepicker({
  // dateFormat: "d-m-Y",
  // minDate: 01-06-2019
 // });


 
       function getdst(distid){
             $.post('<?php echo base_url(); ?>District/get_dist/'+distid, function(data) {
              if(data!='')
              {
                 $('#blockdtl').html(data);
                 // $('#subblck').html(data);
              }
              else
              {
                 $('#blockdtl').html('');
                 // $('#subblck').html('');
              }
   });   
       }

           function getdst2(distid){
			   // alert(distid);
             $.post('<?php echo base_url(); ?>District/get_dist/'+distid, function(data) {
              if(data!='')
              {
                 // $('#blockdtl').html(data);
                 $('#subblck').html(data);
              }
              else
              {
                 // $('#blockdtl').html('');
                 $('#subblck').html('');
              }
   });   
       }

      
	   
	    function get_school_key(udise){
        $.post('<?php echo base_url(); ?>District/school_key/'+udise, function(data) {
              if(data!='')
              {
                $('#hid_school_key').val(data);
              }
              else
              {
                 $('#hid_school_key').val('');
              }
   });  
       }

       function get_schl(blckid){
        // alert();

            $.post('<?php echo base_url(); ?>District/get_schol/'+blckid, function(data) {
              if(data!='')
              {
                // alert(data);
                 $('#getschl').html(data);
               }
              else
              {
                 $('#getschl').html('');
              }
   });
          
       }

       function get_tech_cat(myschl_id){

            
            $.post('<?php echo base_url(); ?>State/tech_cat_only/'+myschl_id, function(data) {
              if(data!='')
              {
                 //alert(data);
                 $('#type_tech').html(data);
               }
              else
              {
                 $('#type_tech').html('');
              }
        });

       }

       function get_tchr(schl_id){
          
        if(schl_id == "")
        {
            schl_id = 'empty';
        }
            
			var new_school =$("#getschl").val();
			var schl_id=schl_id+'-'+new_school;
            $.post('<?php echo base_url(); ?>State/get_tchr/'+schl_id, function(data) {
              if(data!='')
              {
                
                 $('#gettchr').html(data);
               }
              else
              {
                 $('#gettchr').html('');
              }
   });
              
       }

       function getdst_anthr(dist_id){

                $.post('<?php echo base_url(); ?>District/get_dist_nme/'+dist_id, function(data) {
              if(data!='')
              {
                 $('#showdist').html(data);
              }
              else
              {
                 $('#showdist').html('');
              }
   });   

       }


       /*function get_tchr_type_only(tech_id){

        tech_id1 = "";
        if(tech_id == "")
        {
            tech_id = 'empty';
        }

        $.post('<?php echo base_url(); ?>District/get_desig/'+tech_id, function(data) {
              if(data!='')
              {
                // alert(data);
                 $('#design_txt').html(data);
              }
              else
              {
                 $('#design_txt').html('');
              }
   });       
            

       }*/


       function tech_nme_only(tech_id){

        if(tech_id == "")
        {
            tech_id = 'empty';
        }
        
        $.post('<?php echo base_url(); ?>District/get_nme_only/'+tech_id, function(data) {
              if(data!='')
              {
                // alert(data);
                 $('#shownme').html(data);
              }
              else
              {
                 $('#shownme').html('');
              }
        });
       }


       function get_another_block(blck_id){
        $.post('<?php echo base_url(); ?>District/get_block_dtls/'+blck_id, function(data) {
              if(data!='')
              {
                // alert(data);
                 $('#anothr_blck_dtls').html(data);
              }
              else
              {
                 $('#anothr_blck_dtls').html('');
              }
        });
       }


       function get_schl_key(schl_id){
        // alert(schl_id);
        $.post('<?php echo base_url(); ?>District/get_schl_keyval/'+schl_id, function(data) {
              if(data!='')
              {
                //alert(data);
                 $('#schl_key').val(data);
              }
              else
              {
                 $('#schl_key').val('');
              }
        });
       }


       // function get_udise(get_udise){
       //  alert(get_udise);
       // }

   </script>


   <script type="text/javascript">
       // function call for auto pop subcaste
    
   


  function transferteacher()  
		 {
		
      
	
		
		 var office=$("#officelist").val();
		if(office=='')
		{
		var old_school = $("#getschl").val();
		var new_school =$("#anothr_blck_dtls").val();
		var transferdate=$("#transferdate").val();
        var teachertypefrom=$("#type_tech").val();
        var teachertypeto=$("#techtype1").val();
		// alert(transferdate);
		// return false;
		var teacheruid=$("#gettchr").val();
		var oldschool_key=$("#schl_key").val();
		var newschool_key=$("#hid_school_key").val();
		var category=$("#t_cat").val();	
		var new_dist = $("#n_dist option:selected").text();
		 var old_dist = $("#o_dist option:selected").text();
		 var old_block = $("#blockdtl  option:selected").text();
		 var new_block = $("#subblck option:selected").text();
		 var  transfer_by = $("#trans_by").val();
		}
		else
		{
		var old_school = $("#getschl").val();
		var new_school =$("#anothr_blck_dtls").val();
		var transferdate=$("#transferdate").val();
        var teachertypefrom=$("#type_tech").val();
        var teachertypeto=$("#techtype1").val();
		// alert(transferdate);
		// return false;
		var teacheruid=$("#gettchr").val();
		var oldschool_key=$("#schl_key").val();
		var newschool_key=$("#officelist").val();
		var category=$("#t_cat").val();	
		var new_dist = $("#n_dist option:selected").text();
		 var old_dist = $("#o_dist option:selected").text();
		 var old_block = $("#blockdtl  option:selected").text();
		 var new_block = $("#subblck option:selected").text();
		 var  transfer_by = $("#trans_by").val();
		}	
		
		
		if(category=='Deputation')
		{
			
			 $.ajax(
		            {
			data:{'old_school':old_school,'new_school':new_school,'oldschool_key':oldschool_key,'newschool_key':newschool_key,'teacheruid':teacheruid,'transferdate':transferdate,'new_dist':new_dist,'old_dist':old_dist,'new_block':new_block,'old_block':old_block,'transfer_by':transfer_by,'category':category,'teachertypefrom':teachertypefrom,'teachertypeto':teachertypeto},
			url:baseurl+'Ceo_District/transfer_teacher_debutation',
			type:"POST",
			dataType:"JSON",
			success:function(res)
			{
				
			swal("OK","Teacher Transfer Successfully","success");
			//window.location.reload();
			
				}
		    });
			//return false;
		}
		else
		{
			
				 $.ajax(
		            {
			data:{'old_school':old_school,'new_school':new_school,'oldschool_key':oldschool_key,'newschool_key':newschool_key,'teacheruid':teacheruid,'transferdate':transferdate,'new_dist':new_dist,'old_dist':old_dist,'new_block':new_block,'old_block':old_block,'transfer_by':transfer_by,'category':category,'teachertypefrom':teachertypefrom,'teachertypeto':teachertypeto},
			url:baseurl+'Ceo_District/transfer_teacher',
			type:"POST",
			dataType:"JSON",
			success:function(res)
			{
				
			swal("OK","Teacher Transfer Successfully","success");
			//window.location.reload();
			
				}
		    });
		 }
		 
		 }
	     // function transferteacher()  
		 // {
		// var office=$("#officelist").val();
		// if(office=='')
		// {
		// var old_school = $("#getschl").val();
		// var new_school =$("#anothr_blck_dtls").val();
		// var transferdate=$("#transferdate").val();
		// var teacheruid=$("#gettchr").val();
		// var oldschool_key=$("#schl_key").val();
		// var newschool_key=$("#hid_school_key").val();
		// var category=$("#t_cat").val();	
		// }
		// else
		// {
		// var old_school = $("#getschl").val();
		// var new_school =$("#anothr_blck_dtls").val();
		// var transferdate=$("#transferdate").val();
		// var teacheruid=$("#gettchr").val();
		// var oldschool_key=$("#schl_key").val();
		// var newschool_key=$("#officelist").val();
		// var category=$("#t_cat").val();	
		// }
        
		
		
		// if(category=='Deputation')
		// {
			
			 // $.ajax(
		            // {
			// data:{'old_school':old_school,'new_school':new_school,'oldschool_key':oldschool_key,'newschool_key':newschool_key,'teacheruid':teacheruid,'transferdate':transferdate},
			// url:baseurl+'Ceo_District/transfer_teacher_debutation',
			// type:"POST",
			// dataType:"JSON",
			// success:function(res)
			// {
				
			// swal("OK","Teacher Transfer Successfully","success");
			// //window.location.reload();
			
				// }
		    // });
			// return false;
		// }
		// else
		// {
			
				 // $.ajax(
		            // {
			// data:{'old_school':old_school,'new_school':new_school,'oldschool_key':oldschool_key,'newschool_key':newschool_key,'teacheruid':teacheruid,'transferdate':transferdate},
			// url:baseurl+'Ceo_District/transfer_teacher',
			// type:"POST",
			// dataType:"JSON",
			// success:function(res)
			// {
				
			// swal("OK","Teacher Transfer Successfully","success");
			// //window.location.reload();
			
				// }
		    // });
		 // }
		 
		 // }

        // Enrolment4 Form
// $("#12tech_trans_frm").validate({

    
                        // rules: {
                          // t_dist:{
                            // required:true,
                            // customvalidationselectfield:true,
                          // },
                          // t_block:{
                            // required:true,
                            // customvalidationselectfield:true,
                          // },
                          // t_school:{
                            // required:true,
                            // customvalidationselectfield:true,
                          // },
                          // t_name:{
                            // required:true,
                            // customvalidationselectfield:true,
                          // },
                          // t_cat:{
                            // required:true,
                            // customvalidationselectfield:true,
                          // },

                          // blocknxt:{
                            // required:true,
                            // customvalidationselectfield:true,
                          // },
                          // next_school:{
                            // required:true,
                            // selectvalid:true,
                          // },
                          // techtype:{
                            // required:true,
                            // selectvalid:true,
                          // },
						  // techtype1:{
                            // required:true,
                            // selectvalid:true,
                          // },
                          // t_remark:{
                              // required:true,
                              // teachercode:true,
                              // maxlength:140,
                            // },
                            // trans_date:{
                              // required:true,
                            // },
                            // trans_month:{
                                // required:true,
                            // },
                            // trans_year:{
                                // required:true,
                            // }                            

                      // },
             // onfocusout: function(element) {
            // this.element(element);
        // },
        // submitHandler : function(form){ 
            // valid();



        // }
        // // success: function(element) {
        // //     valid();
        // // },

   // });
        
             $.validator.addMethod("customvalidationselectfield",
               function(){
               return $('').val()!="none";
            });

             $.validator.addMethod("selectvalid",
               function(){
               return $('').val()!="none";
            });

            

          $.validator.addMethod("customvalidation",
               function(value,element){
                     return /^[0-9]+$/.test(value);
               },
               "Allowed number value only");


           $.validator.addMethod("teachercode",
               function(value,element){
                     return /^[0-9 a-zA-Z,/]+$/.test(value);
               },
               "Allowed alphanumeric only");





   </script>

    </body>


</html>