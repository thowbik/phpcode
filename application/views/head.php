<?php  
    
    header("Cache-Control: no-cache, must-revalidate");
    header("Expires: Wed, 18 Oct 1989 22:05:40 GMT");
    $this->load->library('session'); 
    $this->load->database(); 
    $this->load->model('Homemodel');
    

    $user_type_id=$this->session->userdata('emis_user_type_id');
   
    $schoolname_title  = "";
    $udise_code_title  = "";
    $school_id = "";

    if($user_type_id==1){ 
     $school_id=$this->session->userdata('emis_school_id');

    if($school_id!=""){
    $schoolprofile = $this->Homemodel->getschoolprofiledetails($school_id);
    $schoolname_title  = $schoolprofile[0]->school_name;
    $udise_code_title  = $schoolprofile[0]->udise_code;

    }

    }

    ?>

        <meta charset="utf-8" />
	    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
	    <META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
        <title>EMIS | TN Schools<?php if($school_id!=""){ echo ' | '.$schoolname_title.' | '.$udise_code_title; } ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Tamilnadu Educational Informtion Management System" name="Educational Management Information System. Online Applications, State , District , Schools" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
       
        <link href="<?php echo base_url().'asset/global/plugins/font-awesome/css/font-awesome.min.css';?>" rel="stylesheet" type="text/css" />
  
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap/css/bootstrap.min.css';?>" rel="stylesheet" type="text/css" />

         <link href="<?php echo base_url().'asset/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css';?>" rel="stylesheet" type="text/css" />

        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url().'asset/global/css/components-md.min.css';?>" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url().'asset/global/css/plugins-md.min.css';?>" rel="stylesheet" type="text/css" />

        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo base_url().'asset/layouts/layout3/css/layout.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/layouts/layout3/css/themes/default.min.css';?>" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo base_url().'asset/layouts/layout3/css/custom.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-sweetalert/sweetalert.css';?>" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-toastr/toastr.min.css';?>" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="<?php echo base_url().'asset/images/favicon.ico';?>" /> 