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
                                 <!--<div class="top-menu">
                                    <ul class="nav navbar-nav pull-right">
                                        <li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">
                                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                               
                                            </a>
                                            </li>
                                            </ul>
                                            </div>-->
                                    </div>
                                </div>
                                </div>
                                </div>
                                </div>
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
                                                            <i class="fa fa-users"></i>Create Account for School new registration</span>
                                                        </div>
                                                        <div class="tools"> </div>
                                                        
                                                    </div>
                                                        <div class="portlet-body">
                                                             <!-- BEGIN FORM-->
                                                             
                                                                <div class="form-body">
                                                                    <h4 class="text-center">Username and Password has been sent in you School email.</h4>
                                                                </div>
                                                                <div class="form-group text-center">
                                                                <button type="button" class="btn btn-success" onclick="window.location.href='<?php echo base_url().'Newschool/new_school/2'; ?>'">Go to Log In</button>
                                                                </div>
                                                                </div>
                                                                </div>
                                                                </div>
                                                                </div>
                                                                </div>
                                                                </div>
                                                                </div>
                                                                
                        
                            
<hr/>
<br />
<br />
</div> 
<!--container end.//-->

 <?php $this->load->view('footer.php'); ?>
 </body>

	<script>
     /************************************************************
        Function done by Magesh Elumalai
     ************************************************************/
     
        function textvalidate(id,alertId) {
            var text = document.getElementById(id);
            var alt = document.getElementById(alertId);
            //alert(alt);
            if(text.value =='') {
                alt.innerHTML='This field is required';
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
						return false;
					}else if(!text.value.match(mobpattern)){
						alt.innerHTML="Enter valid mobile number";
						return false;
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
						return false;
					}else if(!text.value.match(emailreg)){
						alt.innerHTML="Enter valid Email";
						return false;
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