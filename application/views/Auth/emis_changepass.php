<!DOCTYPE html>
<html lang="en">

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
        <h1>Change Password
            <small>school user Change password</small>
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
       
 <!-- <?php $this->load->view('emis_school_profile_header1.php'); ?> -->

           <!-- <div class="m-heading-1 border-green m-bordered">
            <h3>Basic Information</h3>
        </div> -->  

    <?php 

    $schoolname  = "";
    $udise_code  = "";
    $blockname  = "";
    $schoolcate  = "";
    $schmanage  = "";
    $schdirector  = "";
    $school_id = "";

    if(isset($email)){ 

    $this->load->library('session'); 
    $this->load->database(); 
    $this->load->model('Homemodel');
    $school_id=$this->Homemodel->getschoolidbyemail($email);
    $schoolprofile = $this->Homemodel->getschoolprofiledetails($school_id);
    $schoolname  = $schoolprofile[0]->school_name;
    $udise_code  = $schoolprofile[0]->udise_code;
    $blockname  = $this->Homemodel->getblockname($schoolprofile[0]->block_id);
    $schoolcate  = $this->Homemodel->getcatename($schoolprofile[0]->sch_cate_id);
    $schmanage  = $this->Homemodel->getmanagename($schoolprofile[0]->sch_management_id);
    $schdirector  = $this->Homemodel->getdirectoratename($schoolprofile[0]->sch_directorate_id);

    }
     ?>                              
                                  <div class="row">
                                                        
                                                   
            <div class="col-md-12"><br/>
            <span> <i class="fa fa-bank fa-3x font-green-haze"><font style="font-size:25px;font-family: 'open sans';" class="number font-red"> <?php if($schoolname!=""){ echo $schoolname; } ?> ( <?php if($udise_code!=""){ echo $udise_code; } ?> )</font></i></span> <hr>

            </div>
          <ul class="list-inline" style="margin-left: 7px;">
             <li>
                <font style="color:#9b9b9b;"><i class="fa fa-map-marker"></i> Block :</font> 
               <?php if($blockname!=""){ echo $blockname; } ?> </li>
                <li>
                <font style="color:#9b9b9b;"><i class="fa fa-map-marker"></i> Category :</font> 
                <?php if($schoolcate!=""){ echo $schoolcate; } ?> </li>
                <li>
                <font style="color:#9b9b9b;"><i class="fa fa-calendar"></i> Management :</font> <?php if($schmanage!=""){ echo $schmanage; } ?> </li>
                <li>
                <font style="color:#9b9b9b;"><i class="fa fa-briefcase"></i> Directorate :</font> <?php if($schdirector!=""){ echo $schdirector; } ?> </li>
            </ul><br/>
                                        </div>


        <div class="portlet light portlet-fit ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-users"></i>
                    <span class="caption-subject font-dark sbold uppercase">Change Password Form</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-12">
                     <div class="tab-pane" id="tab_2">
                         
                            <div class="portlet light ">
                               
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                           <form class="form-horizontal" method="post" id="emis_changepass" name="emis_changepass" action="<?php echo base_url().'Security/change_password';?>">
                                  <!-- <form class="form-horizontal" method="post" id="emis_stu_reg_form" name="emis_stu_reg_form"
                                > --><center>
                                        <div class="form-body">
                                            <h3 class="form-section">Change Password</h3>
                                            <center>
                                             <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <label class="control-label col-md-4">New password *</label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" id="emis_rest_user_newpass1" name="emis_rest_user_newpass1"  placeholder="New Password *" onkeyup='password_strength(this.value)'>
                                                             <font style="color:#dd4b39;"><div id="emis_rest_user_newpass1_alert"></div></font>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                         <input type="hidden" id="emis_schoolid" name="emis_schoolid" 
                                         value="<?php echo $school_id; ?>" />
                                        <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                <label class="control-label col-md-4">Confirm New password *</label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" id="emis_rest_user_cnfpass1" name="emis_rest_user_cnfpass1"  placeholder="Confirm New password *">
                                                             <font style="color:#dd4b39;"><div id="emis_rest_user_cnfpass1_alert"></div></font>
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
                                                            <button type="submit" class="btn green" id="emis_school_reset_pass1" onclick="return checkpassword()">Submit</button>
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

   <script type="text/javascript">

   $(document).ready(function(){  // function call for validate company name 
    $("#emis_rest_user_newpass1").keyup(function(){
      return validatetext('emis_rest_user_newpass1','emis_rest_user_newpass1_alert'); 
});   });

$(document).ready(function(){  // function call for validate company name 
    $("#emis_rest_user_cnfpass1").keyup(function(){
      return validatetext('emis_rest_user_cnfpass1','emis_rest_user_cnfpass1_alert'); 
});   });

   function checkpassword(){
    var chgpass = $('#emis_rest_user_newpass1').val();
    var newpass = $('#emis_rest_user_cnfpass1').val();

    if(chgpass!="" || newpass!="" ){

    if(chgpass!=newpass){
         swal("Cancelled", "Password not match", "error");
        return false;
    }else{
        return true;
    }

}else{
     swal("Warning", "Please enter all fields", "error");
     return false;
}

   }
       
   </script>



        <!-- BEGIN PAGE LEVEL SCRIPTS -->

        <!-- END PAGE LEVEL SCRIPTS -->


    </body>

</html>