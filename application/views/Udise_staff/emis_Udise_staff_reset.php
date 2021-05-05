<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
    <style>
    .clickable{
    cursor: pointer;   
}

.panel-heading span {
    margin-top: -20px;
    font-size: 15px;
}
.tablecolor
{
    background-color: #32c5d2; 
}
.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 35px;
}
.btn-circle.btn-lgs {
  width: 50px;
  height: 50px;
  padding: 10px 16px;
  
  line-height: 1.33;
  border-radius: 25px;
  font-size:15px  !important;
}
.header-size
{
    font-size:11px !important ; 
    text-align: center;
}
small
{
  font-size:14px!important;
}
.btn
{
      text-transform: initial !important;

}
.btn-block
{
  width: 80% !important;
  border-radius: 10px !important; 
  font-size: 15px !important;
  margin-left :5px !important;
}
.custom
{
  width: 100px !important;
  margin-bottom: 5px !important;
}
.badge
{
  color:black !important;
}
.panel-title
{
  color:#000 !important;
}
.pull-right
{
  color:#000 !important;
}
.fa-stack-1x
{
  margin-left :-30% !important;
  /*color :black !important;*/
  margin-top: 2px !important;
  font-size:18px !important;
}
.center
{
  text-align:center;
}
.box-content {
  display: inline-block;
  width: 200px;
    padding: 10px;
}

</style>
    <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-table/bootstrap-table.min.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
            
            <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.css';?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
            
            <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
       
        <!-- END PAGE LEVEL STYLES -->

        </head>
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
            

<?php $this->load->view('Udise_staff/header.php'); ?>
  


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
                                 <form class="form-horizontal" method="post" action="<?php echo base_url().'Udise_staff/emis_teacher_reset_password'?>"id="" 
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
                                                            <input type="password" class="form-control" id="emis_rest_pass" name="emis_rest_user_oldpass"  placeholder="Old Password *" required="true">
                                                             <font style="color:#dd4b39;"><div id="emis_rest_user_oldpass_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                             <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <label class="control-label col-md-4">New password *</label>
                                                        <div class="col-md-4">
                                                            <input type="password" class="form-control" id="emis_rest_user_newpass" name="emis_rest_user_newpass"  placeholder="New Password *" onkeyup='password_strength(this.value)'  required="true">
                                                             <font style="color:#dd4b39;"><div id="emis_rest_user_newpass_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <label class="control-label col-md-4">Confirm New password *</label>
                                                        <div class="col-md-4">
                                                            <input type="password" class="form-control" id="emis_rest_user_cnfpass" name="emis_rest_user_cnfpass"  placeholder="Confirm New password *"  required="true">
                                                             <font style="color:#dd4b39;"><div id="emis_rest_user_cnfpass_alert"></div></font>
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
                                                            <button type="Submit" class="btn green" id="">Submit</button>
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6"> 
                                                    <?php if(isset($error)){ ?>
                            <div class="alert alert-danger"><button class="close" data-close="alert"></button>
                            <?php  echo $error; ?> </div><?php } ?>
                                                </div>
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





        <!-- BEGIN PAGE LEVEL SCRIPTS -->

        <!-- END PAGE LEVEL SCRIPTS -->


    </body>

    <script type="text/javascript">
        var old_pass = <?php echo json_encode($password);?>;
            $("#emis_rest_pass").change(function()
            {
                    $("#emis_rest_user_oldpass_alert").text('');

                var user_pass = $(this).val();

                if(user_pass == old_pass.ref)
                {
                    $("#emis_rest_user_oldpass_alert").text('');
                }else
                {
                    $("#emis_rest_user_oldpass_alert").text('old password is Incorrect');
                }

            })
    </script>

</html>