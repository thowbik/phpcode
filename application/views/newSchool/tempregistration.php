<?php
?>

<!DOCTYPE html>

      <html lang="en">
         <!--<![endif]-->
         <!-- BEGIN HEAD -->
         <head>
            <?php $this->load->view('head.php'); ?>
        
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        </head>
         <!-- END HEAD -->
         <body style="font-size: 1.5em;">


<div class="container">
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
                                 
                       </div>
                 </div>
            </div>
        </div>
     </div>
                                <!-- BEGIN PAGE CONTENT INNER -->
      <div class="page-content-inner">
           <div class="row">
                  <div class="portlet-body">
                        <div class="row">
                               <div class="col-md-12">
                                              <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                     <div class="portlet box green">
                                         <div class="portlet-title">
                                              <div class="caption">
                                                  
                                              </div>
                                               <div class="tools"> </div>
                                                        
                                           </div>
                                           <div class="portlet-body">
                                                             <!-- BEGIN FORM-->
                                                <div class="col-md-12">
                                                    <div class="col-md-6">
                                                        
                                                        <?php echo $this->session->flashdata('Account'); ?>
                                                        <form class="form-horizontal" id="schoolnew_register" name="schoolnew_register" action="<?php echo base_url().'Newschool/newschool_create/1';?>" method="post" onsubmit="return frmsubmit();">
                                                            <h4><i class="glyphicon glyphicon-new-window"></i> Create Account for School new registration</h4>
                                                            <div class="form-group">
                                                                    <label class="control-label"> <i class="fa fa-user"> School Name</i>  <font style="color:#dd4b39;">*</font></label>
													                
                                                                    <input type="text" class="form-control" id="school_name" name="school_name" placeholder="School Name" maxlength="100" required="required" onkeyup='this.value=this.value.toUpperCase();hasWhiteSpace(this);' onkeypress="return  event.charCode >= 97 && event.charCode <= 122 || event.charCode >= 65 && event.charCode <= 90 || event.charCode == 32" onchange="textvalidate(this.id,'school_name_alert');" onfocus="textvalidate(this.id,'school_name_alert');" autocomplete="off" />
															     	<font style="color:#dd4b39;" ><div id="school_name_alert"></div></font>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="control-label"> <i class="fa fa-envelope"> School Email</i>  <font style="color:#dd4b39;">*</font></label>
															    
                                                                    <input type="email" class="form-control" id="email" name="email" placeholder="School Email" maxlength="100" required="required" autocomplete="off"  onchange="emailvalidate(this.id,'school_email_alert');" onfocus="emailvalidate(this.id,'school_email_alert');">
															         <font style="color:#dd4b39;"><div id="school_email_alert"></div></font>
                                                                 
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="control-label"> <i class="fa fa-phone"> School / Office Mobile</i>  <font style="color:#dd4b39;">*</font></label>
															    
                                                                    <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="School / Office Mobile" maxlength="10" required="required" autocomplete="off" onchange="mobilevalidate(this.id,'school_phone_alert');" onfocus="mobilevalidate(this.id,'school_phone_alert');" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
								     	                            <font style="color:#dd4b39;"><div id="school_phone_alert"></div></font>
                                                                
                                                            </div>
                                                            
                                                            
                                                            <div class="form-group">
                                                               <label class="text-center">Select Management <font style="color:#dd4b39;">*</font></label>
															      <select class="form-control" id="sch_management_id" name="sch_management_id" onfocus="textvalidate(this.id,'managealert');" onchange="textvalidate(this.id,'managealert');if(this.value==23){document.getElementById('sch_directorate_id').value=28;}else if(this.value==24){document.getElementById('sch_directorate_id').value=29;}else{document.getElementById('sch_directorate_id').value='';}" >
                                                                       <option value="">Choose</option>
                                                                       <option value="23">Matriculation School</option>
                                                                       <option value="24">Nursery & Primary School</option>  
                                                                  </select>
															     <font style="color:#dd4b39;" id="managealert"></font>
                                                                 <input type="hidden" value="3" id="manage_cate_id" name="manage_cate_id"/>
                                                                 <input type="hidden" value="" id="sch_directorate_id" name="sch_directorate_id" required="required" />
                                                            </div>
                                                            
                                                            
                                                            <div class="form-group text-center">
                                                                <button type="submit" class="btn btn-info">Create Account</button>
                                                                
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="col-md-2"></div>
                                                    <div class="col-md-4">
                                                        <?php echo $this->session->flashdata('Login'); ?>
                                                        <form class="form-horizontal" id="schoolnew_login" name="schoolnew_login" action="<?php echo base_url().'Newschool/newschool_login/2';?>" method="post">
                                                            <h4><i class="glyphicon glyphicon-log-in"></i> Already have account Login Here!</h4>
                                                            <div class="form-group">
															    <label class="control-label"> <i class="fa fa-user"> User Name</i>  <font style="color:#dd4b39;">*</font></label>
															    <div class="">
                                                                     <input type="text" class="form-control" id="emis_username" name="emis_username" placeholder="User Name" maxlength="100" required="required" onchange="textvalidate(this.id,'emis_username_alert');" onfocus="textvalidate(this.id,'emis_username_alert');" autocomplete="off"  >
															     	 <font style="color:#dd4b39;" >
                                                                      <div id="emis_username_alert"></div></font>
												                </div>
												            </div>
                                                            
                                                            <div class="form-group">
															     <label class="control-label"> <i class="fa fa-envelope"> Password</i>  <font style="color:#dd4b39;">*</font></label>
														         <div class="">
                                                                       <input type="password" class="form-control" id="emis_password" name="emis_password" placeholder="Password" maxlength="100" required="required" autocomplete="off"  onchange="textvalidate(this.id,'emis_password_alert');" onfocus="textvalidate(this.id,'emis_password_alert');">
															     	   <font style="color:#dd4b39;"><div id="emis_password_alert"></div></font>
									                             </div>
																
												            </div>
                                                            <div class="form-group text-center">
                                                                <button type="submit" class="btn btn-info">Login</button>
                                                            </div>
                                                            
                                                        </form>
                                                    </div>
                                                </div>
                                                <button style="visibility: hidden;">XXXXX</button>
                                           </div>
                                     </div>
                               </div>
                        </div>
                  </div>
             </div>
     </div>

</div> 
<!--container end.//-->

 <?php $this->load->view('footer.php'); ?>
 <?php $this->load->view('scripts.php'); ?>
 </body>

	<script>
     /************************************************************
        Function done by Magesh Elumalai
     ************************************************************/
        function frmsubmit(){
            if(document.getElementById('sch_directorate_id').value==''){
                return false;
            }else{
                return true;
            }
        }
        
        function textvalidate(id,alertId) {
            var text = document.getElementById(id);
            var alt = document.getElementById(alertId);
            //alert(alt);
            if(text.value =='') {
                alt.innerHTML='This field is required';
                text.value='';
                return true;
            }else {
                alt.innerHTML = "";
            }
        }
        
        function mobilevalidate(id,alertid){
					var mobpattern = /^[6789]\d{9}$/;
					var text = document.getElementById(id);
					var alt = document.getElementById(alertid);
					if(text.value==''){
						alt.innerHTML="This field is required";
                        text.value='';
						return true;
					}else if(!text.value.match(mobpattern)){
						alt.innerHTML="Enter valid mobile number";
                        text.value='';
						return true;
					}else {
						alt.innerHTML="";
					}
	    }
        
        
        function emailvalidate(id,alertid){
					var emailreg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
					var text = document.getElementById(id);
					var alt = document.getElementById(alertid);
					if(text.value==''){
						alt.innerHTML="This field is required";
                        text.value='';
						return true;
					}else if(!text.value.match(emailreg)){
						alt.innerHTML="Enter valid Email";
						text.value='';
						return true;
					}else {
						alt.innerHTML="";
					}
		}
        
        function hasWhiteSpace(s) {
				var str=s.value;
				if((str.charCodeAt(str.length-1)==32) && (str.charCodeAt(str.length-2)==32)){
				str = str.slice(0, -1);
				s.value=str;
			}
		}
        
        /*******************************************************************
        *******************************************************************/
    </script>
      </html>