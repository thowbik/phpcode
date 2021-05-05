<!DOCTYPE html>

      <html lang="en">
         <!--<![endif]-->
         <!-- BEGIN HEAD -->
         <head>
            <?php $this->load->view('head.php'); ?>
          
        <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url().'asset/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'asset/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/css/support/custom-vivek.css';?>" rel="stylesheet" type="text/css" />

         </head>
         <!-- END HEAD -->
         <style type="text/css">

         
            label.error { float: none; color:#dd4b39; }
         </style>
         <body class="page-container-bg-solid page-md">
            <div class="page-wrapper">
               <?php if($this->session->userdata('emis_user_type_id') == 3 )  {?>
               <?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
               <?php $this->load->view('block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 9) { ?>
               <?php $this->load->view('Collector/header.php'); }else if($this->session->userdata('emis_user_type_id') == 6) { ?>
               <?php $this->load->view('beo_Block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 10) { ?>
               <?php $this->load->view('Deo_District/header.php'); }else{ ?>
               <?php $this->load->view('header.php'); }?>
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

 

                                    <h1>Transfer Application-BEO
                                       <small>Staff profile</small>
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
                                    <?php if($this->session->userdata('emis_school_id')!=''){
                                    $this->load->view('emis_school_profile_header1.php'); }?>
                                    <!-- <div class="m-heading-1 border-green m-bordered">
                                       <h3>Basic Information</h3>
                                       </div> -->
                                    
                                    <br />
                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="tab-pane" id="tab_2">
                                             <div class="portlet light ">
                                                <div class="portlet-title">
                                                   <div class="caption">
                                                      <i class="icon-equalizer font-green-haze"></i>
                                                      <span class="caption-subject font-green-haze bold uppercase"> BEO-Transfer Application</span>
                                                      <span class="caption-helper"></span>
                                                   </div>
                                                </div>
     <div class="portlet-body form" id="dialogform">
                                       <!-- error displaying part -->
                     <!-- BEGIN PAGE CONTENT INNER -->
     <form method="post"  action="<?php echo base_url().'Collector/beo_form';?>" name="beoform_submit"  id="beoform_submit" >

             <div class="col-md-12">
                     
                 <input type="hidden" class="form-control" id="district_id" name="district_id"  value="<?php echo $this->session->userdata('emis_district_id'); ?>">
                     <div class="col-md-4">
                          <span style="margin-right: 0px;"><input type="checkbox" name="profile_count[]" class="checkbox"  value="5" style="display: inline-block;">Within District</span>
                     </div>
              
                    <div class="col-md-4">
                          <span style="margin-right: 0px;"><input type="checkbox" name="profile_count[]" class="checkbox"  value="3" style="display: inline-block;">District to District</span>
                    </div>
                 </div>
                       <!-- END PAGE CONTENT INNER -->
                                   </div>
                  <hr>
                   </br></br>
                  <div class="row">
                                   <div class="col-md-4">
                                      <label class="control-label">Select Education District</label>
                                                                  
                                     <div class="col-md-9">
                                       <select class="form-control" id="education_district" name="education_district"  onchange="get_edu_dist_beo(this)" required>
                                                                        
                                        <option value="">Select Education District</option>
                                                  <?php foreach($edu_dist as $aca) {
                                                                     
                                                                        ?>
                                        <option value="<?php echo $aca['edu_dist_id']; ?>"><?php echo $aca['edu_dist_name']; ?></option>
                                                                        <?php }?>
                                    
                                     </select>
                                  
                                                                  </div>
                                                             
                                                            </div>


                    <div class="col-md-4"> 
                       <label class="control-label">Select Block Name</label>
                        <div class="col-md-9">
                                                                     <select class="form-control" id="education_district_blk" name="education_district_blk"  required>
                                                                        
                                                                        <option value="">Select Block</option>
                                                                       <?php foreach($edu_dist_blk as $aca) {
                                                                     
                                                                        ?>
                                                                        <option value="<?php echo $aca['block_id']; ?>"><?php echo $aca['block_name']; ?></option>
                                                                        <?php }?>
                                    
                                     </select>
                                 
                                                                  </div>
                                                             
                                                            </div>
															</div>
                            </br></br>
<div class="row">
                                                               <div class="col-md-4"> 
                       <label class="control-label">Teacher Name</label>
                       <div class="form-group">                     
                          
 
                    <input type="text" name="teacher_name"  class="form-control" id="teacher_name" value="" autocomplete="off" placeholder="Name"   onkeypress="return (event.charCode != 46 && event.charCode >31) && (event.charCode < 48 || event.charCode > 57) "  />
                       </div>                        
                  </div>
                     <div class="col-md-4"> 
                       <label class="control-label">Date Of Birth</label>
                       <div class="form-group">                     
                          
 
                                                        <input type="date" name="DOB"  class="form-control date1" id="DOB" value="" autocomplete="off" placeholder="YYYY-DD-MM"  onkeypress="return event.charCode >= 48"required  />
                                                     
                                                               
                       </div>                        
                  </div>
                    <div class="col-md-4"> 
                       <label class="control-label">Mode Of Recruitment</label>
                        <div class="col-md-12">
                          <select class="form-control" id="recruit_mode" name="recruit_mode"  onchange="getdropdown()"; required>
                                         <option value="0">select one</option>                                
                                       <option value="1">By Direct Recruitment</option>
                                                                      
                                       <option value="2">By Promotion Recruitment</option>
                                                                     
                                     </select>        
                                      </div>             
                  </div>
               </div>
                 </br></br>
			   <div class="row" id="middlehm">
                  <div class="col-md-4"> 
                       <label class="control-label">First Date of joining as middle school HM</label>
                       <div class="form-group">                     
                          
 
                <input type="date" name="mhm_doj"  class="form-control date1" id="dat1" value="" autocomplete="off" placeholder="YYYY-DD-MM"  onkeypress="return event.charCode >= 48"  />
                                                     
                                                               
                       </div>                        
                  </div>
                   <div class="col-md-4"> 
                       <label class="control-label">District in which appointed as Middle School HM </label>
                        <div class="col-md-12">
                          <select class="form-control" id="mhm_district" name="mhm_district" onchange="get_dist_beo(this)" >
                                                                        
                                                                        <option value="">Select District</option>
                                                                       <?php foreach($get_dist_name1 as $aca) {
                                                                    // print_r($get_dist_name1);
                                                                        ?>
                                                                        <option value="<?php echo $aca['district_id']; ?>"><?php echo $aca['district_name']; ?></option>
                                                                        <?php }?>
                                    
                                     </select>        
                                      </div>             
                  </div>
                       <div class="col-md-4"> 
                       <label class="control-label">Block in which appointed as Middle School HM</label>
                        <div class="col-md-12">
                      <select class="form-control" id="mhm_block" name="mhm_block">
                                                                        
                                                                  <option value="">Select Block</option>
                                                                       
                                    
                                     </select>     
                                     </div>                  
                  </div>
                  
				  </div>
            </br></br>
				  <div class="row">
				  
              
              
				  </div>
				 </br></br>
				  <div class="row">

             <div class="col-md-4"> 
                       <label class="control-label">Date of joining as BEO</label>
                       <div class="form-group">                     
                          
 
                                                        <input type="date" name="beo_doj"  class="form-control date1" id="beo_doj" value="" autocomplete="off" placeholder="YYYY-DD-MM"  onkeypress="return event.charCode >= 48"required  />
                                                     
                                                               
                       </div>                        
                  </div>
                 <div class="col-md-4"> 
                       <label class="control-label">Date of joining  as BEO In Present Station</label>
                       <div class="form-group">                     
                          
 
                                                        <input type="date" name="doj_pr_beo"  class="form-control date1" id="doj_pr_beo" value="" autocomplete="off" placeholder="YYYY-DD-MM"  onkeypress="return event.charCode >= 48"required  />
                                                     
                                                               
                       </div>                        
                  </div>
                 </div>  
          
              <div class="col-md-4" id ="dissch"> 
                               
                       </div> 
                
                         <span class="label-text" style="color:gray;"></span>
                   
                  
                                                     
                                                <div class="form-actions">
                                                    <!--<button type="submit" class="btn green" id="emis_staff_reg_sub" onclick="return popup()">Submit</button>-->
                                <button type="button" class="btn btn-primary"  onclick="checkRequired(this.form.id,0,'',popup,'')" >Submit</button>
                                                   
                                                </div>
                                                </form>
                                                <!-- END FORM-->
                                             </div>
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

                           <!-- <form class="contact-form" id="myform" type="post" action="check.php">
                <input type="text" name="first_name"/>
                <input type="text" name="last_name" />
                <input type="text" name="email" id="email" />
                <input type="submit" /> -->
                <!-- <div class="form-errors"></div>
            </form> -->
            </div>
            <?php $this->load->view('footer.php'); ?>
            </div>
      
      
      <?php $this->load->view('scripts.php'); ?>

    <script src="<?php echo base_url().'asset/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/global/plugins/select2/js/select2.full.min.js'?>" type="text/javascript"></script>  
     <script src="<?php echo base_url().'asset/js/vivekrao/generate.js';?>" type="text/javascript"></script>  
      
    <script>
      function popup(frm){
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
        if (isConfirm){
           // frm.submit();
            document.getElementById('beoform_submit').submit();
            swal("OK", "Save Successfully", "success");
        } 
        else{
           swal("Cancelled", "Your cancelled the profile", "error");
            return false;
        }   
    }); 
}
function get_dist_beo(node)
{
    var url='<?php echo base_url().'Collector/get_allblocks';?>';
    $.ajax({
    type: "POST",
    url: url,
    data: '&'+node.name+'='+node.value,
    dataType: "text",
        success: function(resultData) {  
            var blks=JSON.parse(resultData);
            var blk='';

            for(var i in blks){
                blk+='<option value="'+blks[i]['id']+'">'+blks[i]['block_name']+'</option>';
            }
            $("#mhm_block").html(blk);
        }
    });
}


function get_edu_dist_beo(node)
{
    var url='<?php echo base_url().'Collector/get_all_edu_dist'?>';
    $.ajax({
    type: "POST",
    url: url,
    data: '&'+node.name+'='+node.value,
    dataType: "text",
        success: function(resultData) {  
            var blks=JSON.parse(resultData);
            var blk='';

            for(var i in blks){
                blk+='<option value="'+blks[i]['block_id']+'">'+blks[i]['block_name']+'</option>';
            }
            $("#education_district_blk").html(blk);
        }
    });
}
$("#priority_if_claimed").change(function()
			
			{
				var pic = $(this).val();
				 $(".pro_clime").hide();
				 if(pic==3)
				{
				 $("#DOT").hide();	
				}
			    else if(pic==1)
				{
				 $("#DOD").hide();	
				}
				else if(pic==12)
				{
					 // $("#EHWW").show();
					 $("#tr_dist").show();
			         $("#Swork").show();
		
				}
			})
			function getdropdown()
	{
	  var drop= $('#recruit_mode').val();
	 
      if(drop == 1){
		$("#middlehm").hide();
		}
		else
		{
		$("#middlehm").show();	
		}
	}

    </script>
      
           
         </body>
      </html>