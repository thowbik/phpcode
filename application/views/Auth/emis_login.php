<?php




   $this->load->database(); 
    $this->load->model('Homemodel');

    
      
  $flashdata = $this->Homemodel->getflashdata('flash');
  $instruction = $this->Homemodel->getflashdata('instruction');
// echo $_SERVER['HTTP_HOST'];
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>EMIS | TN Schools</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #3 for " name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->

        <link href="<?php echo base_url().'asset/global/plugins/bootstrap/css/bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->

        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url().'asset/global/css/components-md.min.css';?>" rel="stylesheet" id="style_components" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?php echo base_url().'asset/pages/css/login-5.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/font-awesome/css/font-awesome.min.css';?>" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="<?php echo base_url().'asset/images/favicon.ico';?>" /> 
    <!-- END HEAD -->
    <style type="text/css">
        
        <style>
  @-webkit-keyframes argh-my-eyes {
  /*  0%   { background-color: #fff; }
    49% { background-color: #fff; }
    50% { background-color: #000; }
    99% { background-color: #000; }
    100% { background-color: #fff; }*/
     100% { color: #fff; }
  }
  @-moz-keyframes argh-my-eyes {
/*    0%   { background-color: #fff; }
    49% { background-color: #fff; }
    50% { background-color: #000; }
    99% { background-color: #000; }
    100% { background-color: #fff; }*/
    100% { color: #fff; }
  }
  @keyframes argh-my-eyes {
 /*   0%   { background-color: #fff; }
    49% { background-color: #fff; }
    50% { background-color: #000; }
    99% { background-color: #000; }
    100% { background-color: #fff; }*/
    100% { color: #fff; }
  }
  .tollfree {
  -webkit-animation: argh-my-eyes 1s infinite;
  -moz-animation:    argh-my-eyes 1s infinite;
  animation:         argh-my-eyes 1s infinite;
}
</style>
    </style>



    <body class="login" >
        <!-- BEGIN : LOGIN PAGE 5-1 -->
        <div class="user-login-5" >

            <div class="row bs-reset" style="background-image: url('<?php echo base_url().'asset/images/swirl_pattern.png';?>');">

              <!--   <center>
                    <h4 style="color: #d30000;"><u><b>Important Message</b></u></h4> <h4 style="color: #d30000; line-height: 1"><b>Student Creation for all classes is open now. Please enter valid student data.
                        <br/><br/>
                        For district users:  The district level transfer permission for students in other school has been enabled.</b></h4>
                    </center> -->
               
                <div class="col-md-6 bs-reset mt-login-5-bsfix" style="padding: 20px;">
                   
                
                   
                        <!-- <img src="<?php echo base_url().'asset/images/14417.jpg';?>" style="width:40%;height: 70%;"/> -->
                         
                       <center> <h2 style="color: red;" class="tollfree"><u><b>Flash News</b></u></h2></center>

                       <?php

                        foreach ($flashdata as $key) {
                          echo '<p><b>'.$key->content.'</b></p>';
                          if($key->saidby){
                          echo '<font><p><b>-'.$key->saidby.'</p></b></font>';
                          }


                       }       ?>
                        <!--<h2><u><b>Instructions</b></u></h2>-->

                          <?php

                        /*foreach ($instruction as $key) {
                          echo '<p><b>'.$key->content.'</b></p>';
                           if($key->saidby){
                          echo '<font><p><b>-'.$key->saidby.'</p></b></font>';
                        }

                       }    */   ?>
                       
                    <br/>
                     <center>
                    <!--<p>Dear Teachers, please like TN Schools official Facebook page given below, <br/>
                        <a href="https://www.facebook.com/tnschools" target="_blank" style="color:red;"><b>OFFICIAL FACEBOOK PAGE LINK </b></a><br/>
                        And you can also post your success stories in this page</p>-->
                 <!--  <p ><b><h2 style="color: red">SMART CARD ANDROID APP</h2><br/>
                   <a target="_blank" href="https://play.google.com/store/apps/details?id=com.emis.schooleducation"><img src="<?php echo base_url().'asset/images/emisapp.jpg';?>" style="width:70%;height: 70%;"/></a><br/> 
                   <a target="_blank" href="https://play.google.com/store/apps/details?id=com.emis.schooleducation">Click here to download mobile app</a></b></p> -->
              


                 </center>
                </div>
                
                <div class="col-md-6 login-container bs-reset mt-login-5-bsfix" style="background-color: #fff;">
                    <div class="login-content" style="margin-top: 1%;">
                     
                      
                       <center>
                       
                      
                        <img class="" style="height:130px;width: 120px;"  src="<?php echo base_url().'asset/pages/img/tnlogo.png';?>" /> 
                        <h4><b>கல்வியியல் மேலாண்மைத் தகவல் மையம் </b></h4>
                       <hr>
                        <h4><b>Educational Management Information System</b></h4>
                        <h5><br/>EMIS support mail id : tnemiscel@gmail.com</h5>


                      
                        </center>


                        <form action="<?php echo base_url().'Authentication/emis_login_verify';?>" class="login-form" method="post">
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button>
                                <span id>Enter any username and password. </span>
                            </div>

                              <?php if(isset($error)){ ?>
                            <div class="alert alert-danger"><button class="close" data-close="alert"></button>
                            <?php  echo $error; ?> </div><?php } ?>

                         <?php if(validation_errors()){ ?> <div class="alert alert-danger"> <button class="close" data-close="alert"></button><?php echo validation_errors(); ?></div><?php } ?>

                            <div class="row">
                                <div class="col-xs-6">
                                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="Username" name="emis_username" id="emis_username" required/> </div>
                                <div class="col-xs-6">
                                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="Password" name="emis_password" id="emis_password" required/> </div>
                            </div>
                            <div class="row" style="color: #000;">
                                <div class="col-sm-6">
                                    
                                    <button disabled class="btn green" target="_blank" type="submit" name="emis_login_sub" id="emis_login_sub">Sign In</button>
                                    <!-- onclick="event.preventDefault();checklogin(this);"-->
                                </div>
                              
                                <div class="col-sm-6">
                                    <a href="https://docs.google.com/spreadsheets/u/1/d/e/2PACX-1vRXVM0TL-LaiDopjYYRENuKNwmEm1iTBJitif-lcJBYORBPZhcm79SnFHzV58LX3wN1YrS_GI06zbOE/pubhtml" class="btn green" target="_blank">Co-ordinator - Contact Details</a>
                                </div>
                                
                            </div>
                        </form>
                            
                        <br/>
                        <!-- <a href="<?php echo base_url().'asset/pages/img/TN school - EMIS Student data template.pdf';?>" class="btn green" target="_blank">Download EMIS Student data sheet</a> -->

                        <!-- <a href="https://goo.gl/CMkJLx" class="btn green" target="_blank">EMIS - FAQ</a> -->
                         <!-- <a href="https://www.youtube.com/watch?v=VyrWB_zmpaM&feature=youtu.be" class="btn green" target="_blank">How to use EMIS ?</a> -->
                         <div class="col-sm-12">
                         <!-- <a href="<?php //echo base_url().'Authentication/emis_forget_user_details';?>" id="forget-password" class="btn btn-sm" >Forgot Password?</a> -->
                                        <a href="" id="forget-password" class="btn btn-sm" >Forgot Password?</a>
                         </div>
                       <!--<div class="col-sm-6">
                                        <a href="<?php echo base_url().'Newschool/new_school/0';?>" id="newschool" class="btn btn-sm" >New School Registaration</a>
                         </div>-->
                                    
                         
                         
                             
                      
                         

                        <center>
                            <hr/>
                            <!--<div class="col-md-6">

                             <p><b><p style="color: green">SMART CARD ANDROID APP</p></b>
                   <a target="_blank" href="https://play.google.com/store/apps/details?id=com.emis.schooleducation"><img src="<?php echo base_url().'asset/images/emisapp.jpg';?>" style="width:30%;height: 30%;"/></a><br/> 
                   <a target="_blank" href="https://play.google.com/store/apps/details?id=com.emis.schooleducation">Click here to download mobile app</a></p>
                          </div>-->
                           <!--<div class="col-md-6">
                            <p ><b><font style="color: red"><i class="fa fa-phone"></i> TOLL FREE NUMBER</font></b>
                            <h1><b>14417</b></h1>
                            Help line for TN Schools_2</p>
                           </div>-->
                              <!--   <div class="login-copyright text-right" >
                                    <p style="font-size: 10px;">&copy; Educational Management Information System, Designed & Developed by In22labs </p>
                                </div> -->
                            </center>
                    </div>


          

                </div>
                <!-- <div class="col-md-3 bs-reset mt-login-5-bsfix" style="background-color: ;">
                </div> -->
            </div>
        </div>
        <!-- END : LOGIN PAGE 5-1 -->
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<script src="../assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo base_url().'asset/global/plugins/jquery.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap/js/bootstrap.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/js.cookie.min.js';?>" type="text/javascript"></script>

        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url().'asset/global/plugins/jquery-validation/js/jquery.validate.min.js';?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url().'asset/global/scripts/app.min.js';?>" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url().'asset/pages/scripts/login-5.min.js';?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

    <script type="text/javascript">
    /*function checklogin(node){
        var frm=node.form.elements;
        var patt = new RegExp("33[0-9]{9}");
        for(var i in frm){
            if((frm[i] instanceof HTMLInputElement) && frm[i].getAttribute("type")=="text"){
                if(patt.test(frm[i].value)){
                    return true;
                }else{
                    node.form.action="https://emis1.tnschools.gov.in/Authentication/emis_login_verify";
                    node.form.method="post";
                    node.form.submit();
                }
            }
        }
    }*/
    </script>

</html>
