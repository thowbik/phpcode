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
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/font-awesome/css/font-awesome.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap/css/bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css';?>" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url().'asset/global/css/components-md.min.css';?>" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url().'asset/global/css/plugins-md.min.css';?>" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?php echo base_url().'asset/pages/css/login-5.min.css';?>" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="<?php echo base_url().'asset/images/favicon.ico';?>" /> 
    <!-- END HEAD -->



    <body class="login" >
        <!-- BEGIN : LOGIN PAGE 5-1 -->
        <div class="user-login-5" >
            <div class="row bs-reset" style="background-image: url('<?php echo base_url().'asset/images/swirl_pattern.png';?>');">
               <div class="col-md-3 bs-reset mt-login-5-bsfix">
                   
                <br/>
               
                   

                </div>
                <div class="col-md-6 login-container bs-reset mt-login-5-bsfix">
                    <div class="login-content" style="margin-top: 5%;">
                     
                      
                       <center>
                       
                      
                        <img class="" style="height:130px;width: 120px;"  src="<?php echo base_url().'asset/pages/img/tnlogo.png';?>" /> 
                        <h4><b>கல்வித் தகவல் மேலாண்மை முறைமை</b></h4>
                       <hr>
                        <h4><b>Educational Management Information System</b></h4>
                        <h5><br/>EMIS support mail id : tnemiscel@gmail.com</h5>
                       <br/><br/><br/>
                        </center>
                    
                              <?php if(isset($error)){ ?>
                            <div class="alert alert-danger"><button class="close" data-close="alert"></button>
                            <?php  echo $error; ?> </div><?php } ?>

                            <?php if(isset($success)){?>
                            <div class="alert alert-success"><button class="close" data-close="alert"></button>
                                <?=$success;?></div>
                            <?php } ?>

                             <?php if(isset($error2)){ ?>
                            <strong><div class="alert alert-info" style="margin-top: 6px;"><button class="close" data-close="alert"></button>
                            <?php  echo $error2; ?> </div></strong><?php } ?>

                        <!-- BEGIN FORGOT PASSWORD FORM -->
                        <center><div class="">
                            <select id="forget_drop" class="form-control" >
                                <option value=-1>Select</option>
                                <option value=1>Teacher/HM</option>
                                <option value=2>School</option>
                                <!-- <option value=3>BEO</option>
                                <option value=4>Block Co-ordinator</option>
                                <option value=5>DEO</option>
                                <option value=6>District Co-ordinator</option>
                                <option value=7>CEO</option> -->

                            </select>
                        </div></center><br/>
                        
                        
                            <h3 class="font-green" >Forgot Password ?</h3>

                            <!---Teacher Forget Password----->
                            <div id="form1" class="form_data">
                                <form class="form" method="post" action="<?php echo base_url().'Authentication/emis_forget_user_details';?>" >
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>School Udise Code</label>
                                        <input type="text" class="form-control placeholder-no-fix form-group" maxlength="11" autocomplete="off" placeholder="UdiseCode" name="udisecode">
                                    </div>
                                    </div>
                                
                                <div class="col-md-6">
                                    <label>User Name</label>
                                    <input type="tel" maxlength="10" minlength="10" class="form-control placeholder-no-fix form-group" autocomplete="off" placeholder="User Name" name="teacher_code">
                                </div>
                            <br/>
                                
                            </div>
                            <br>
                            

                            <div>
                                <center>
                                <button type="submit" style="margin-top: -3%; margin-left: 2%" class="btn btn-success uppercase" id="emis_school_forgetsub" name="emis_school_forgetsub"> <!--onclick="return chekforgot()">-->Submit</button>
                                <a href="<?php echo base_url();?>" style="margin-top: -3%;" class="btn btn-success uppercase" >Back</a>
                            </center>
                            </div>
                        </form>
                            </div>

                            <!-----School Forget Password---->                           
								<div id="form2" class="form_data">
                                    <form class="form" method="post" action="<?php echo base_url().'Authentication/emis_forgetpassword';?>" >
								 <p style="color: #000;"> Enter your UdiseCode below to reset your password. </p>
								<div class="form-group">
                                <input class="form-control placeholder-no-fix form-group" type="text" maxlength="11" autocomplete="off" placeholder="UdiseCode" name="user_name" id="udisecode" /> 
                               <font style="color:#dd4b39;"></font>
                                </div>
                                <br/>
                            <div>
                                <center>
                                <button type="submit" style="margin-top: -3%; margin-left: 2%" class="btn btn-success uppercase" id="emis_school_forgetsub" name="emis_school_forgetsub"> <!--onclick="return chekforgot()">-->Submit</button>
                                <a href="<?php echo base_url();?>" style="margin-top: -3%;" class="btn btn-success uppercase" >Back</a>
                            </center>
                            </div>
                            <!-- <input type="text" id="form_id" name="form_id"> -->
                        </form>

                        </div>

                        <!-- END FORGOT PASSWORD FORM -->
                    </div>
                

                         

                        <center>
                            <hr/>
                            <div class="col-md-6 ">
                             <p ><b><p style="color: green">SMART CARD ANDROID APP</p></b>
                   <a target="_blank" href="https://play.google.com/store/apps/details?id=com.emis.schooleducation"><img src="<?php echo base_url().'asset/images/emisapp.jpg';?>" style="width:30%;height: 30%;"/></a><br/> 
                   <a target="_blank" href="https://play.google.com/store/apps/details?id=com.emis.schooleducation">Click here to download mobile app</a></p>
                          </div>
                           <!--<div class="col-md-6 ">
                            <p ><b><p style="color: red"><i class="fa fa-phone"></i> TOLL FREE NUMBER</p></b>
                            <h1><b>14417</b></h1>
                            Help line for TN Schools</p>
                           </div>-->
                              <!--   <div class="login-copyright text-right" >
                                    <p style="font-size: 10px;">&copy; Educational Management Information System, Designed & Developed by In22labs </p>
                                </div> -->
                            </center>

                </div>
                 <div class="col-md-3 bs-reset mt-login-5-bsfix">
                   
                <br/>
               
                   

                </div>

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
        <script src="<?php echo base_url().'asset/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/jquery.blockui.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js';?>" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url().'asset/global/plugins/jquery-validation/js/jquery.validate.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/jquery-validation/js/additional-methods.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/select2/js/select2.full.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/backstretch/jquery.backstretch.min.js';?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url().'asset/global/scripts/app.min.js';?>" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url().'asset/pages/scripts/login-5.min.js';?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->

         <script src="<?php echo base_url().'asset/js/validations.js';?>" type="text/javascript"></script>
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

    <script type="text/javascript">
    $(document).ready(function(){  // function call for validate job title 
    $("#emis_forget_email").keyup(function(){

      return validemailid('emis_forget_email','emis_forget_email_alert'); 
});   });

    </script>

<script type="text/javascript">
        $(document).ready(function()
        {
            $('.form_data').hide();
        });


    $("#forget_drop").change(function()
    {
            // alert();
            var drop_val = $(this).val();
        $(".form_data").hide();
        $("#form"+drop_val).show();
        $("#form_id").val(drop_val);
    })
</script>

</html>