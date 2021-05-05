<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>

        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script type="text/javascript">
  function password_strength(password)
        {
            var desc = new Array();
            desc[0] = "Weak";
            desc[1] = "Weak";
            desc[2] = "Better";
            desc[3] = "Medium";
            desc[4] = "Strong";
            desc[5] = "Strongest";

            var points = 0;

            //---- if password is bigger than 4 , give 1 point.
            if (password.length > 2) points++;

            //---- if password has both lowercase and uppercase characters , give 1 point.  
            if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) points++;

            //---- if password has at least one number , give 1 point.
            if (password.match(/\d+/)) points++;

            //---- if password has at least one special caracther , give 1 point.
            if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) ) points++;

            //---- if password is bigger than 12 ,  give 1 point.
            if (password.length > 5) points++;


            //---- Showing  description for password strength.
            document.getElementById("password_description").innerHTML = desc[points];
            
            //---- Changeing CSS class.
            document.getElementById("password_strength").className = "strength" + points;
        }
        </script>
        <style type="text/css">
        #password_description
        {
            font-size: 12px;    
        }

        #password_strength
        {
            height:10px;
            display:block;
        }

        #password_strength_border
        {
            width: 144px;
            height: 10px;
            border: 1px solid black;
        }
        .strength0
        {
            width:200px;
            background:#cccccc;
        }

        .strength1
        {
            width:40px;
            background:#ff0000;
        }

        .strength2
        {
            width:80px; 
            background:#ff5f5f;
        }

        .strength3
        {
            width:100px;
            background:#56e500;
        }

        .strength4
        {
            background:#4dcd00;
            width:140px;
        }

        .strength5
        {
            background:#399800;
            width:200px;
        }
        </style>

        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

  <?php $this->load->view('Collector/header.php'); ?>


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
        <h1>Reset Password
            <small>school user reset password</small>
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
       
 <?php $this->load->view('Collector/emis_district_profile_header.php'); ?>
 </center>

           <!-- <div class="m-heading-1 border-green m-bordered">
            <h3>Basic Information</h3>
        </div> -->  


        <div class="portlet light portlet-fit ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-users"></i>
                    <span class="caption-subject font-dark sbold uppercase">Reset Password Form</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-12">
                     <div class="tab-pane" id="tab_2">
                         
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-equalizer font-green-haze"></i>
                                        <span class="caption-subject font-green-haze bold uppercase">Reset Password</span>
                                        <span class="caption-helper"></span>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                 <form class="form-horizontal" method="post" id="emis_stu_reg_form" name="emis_stu_reg_form"
                                >
                                  <!-- <form class="form-horizontal" method="post" id="emis_stu_reg_form" name="emis_stu_reg_form"
                                > --><center>
                                        <div class="form-body">
                                            <h3 class="form-section">Change Password</h3>
                                            <center>
                                             <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <label class="control-label col-md-4">Old password *</label>
                                                        <div class="col-md-4">
                                                            <input type="password" class="form-control" id="emis_dist_user_oldpass" name="emis_dist_user_oldpass"  placeholder="Old Password *" >
                                                             <font style="color:#dd4b39;"><div id="emis_dist_user_oldpass_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                             <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <label class="control-label col-md-4">New password *</label>
                                                        <div class="col-md-4">
                                                            <input type="password" class="form-control" id="emis_dist_user_newpass" name="emis_dist_user_newpass"  placeholder="New Password *" onkeyup='password_strength(this.value)' >
                                                             <font style="color:#dd4b39;"><div id="emis_dist_user_newpass_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <label class="control-label col-md-4">Confirm New password *</label>
                                                        <div class="col-md-4">
                                                            <input type="password" class="form-control" id="emis_dist_user_cnfpass" name="emis_dist_user_cnfpass"  placeholder="Confirm New password *">
                                                             <font style="color:#dd4b39;"><div id="emis_dist_user_cnfpass_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                       <label>Password Strength</label>
                                <div id="password_description" ></div>
                                <div id="password_strength" class="strength0"></div>

                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-6">
                                                            <button type="button" class="btn green" id="emis_district_reset_pass">Submit</button>
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6"> </div>
                                            </div>
                                        </div>
                                        </div>
                                        </center> 
                                    </form>
                                    <!-- END FORM-->
                                </div>
                            </div>
                        </div> 

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
            </div>

                  <?php $this->load->view('footer.php'); ?>
        </div>

        <?php $this->load->view('scripts.php'); ?>
   <script src="<?php echo base_url().'asset/js/district.js';?>" type="text/javascript"></script>




        <!-- BEGIN PAGE LEVEL SCRIPTS -->

        <!-- END PAGE LEVEL SCRIPTS -->


    </body>

</html>