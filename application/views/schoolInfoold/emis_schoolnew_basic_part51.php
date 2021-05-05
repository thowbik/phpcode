<!DOCTYPE html>

<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <?php $this->load->view('head.php'); ?>
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />
</head>
<!-- END HEAD -->

<body class="page-container-bg-solid page-md">
    <div class="page-wrapper">
            <?php if($this->session->userdata('emis_user_type_id') == 3 )  {?>
            <?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
            <?php $this->load->view('block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 5){ ?>
            <?php $this->load->view('state/header.php'); }else{ $this->load->view('header.php'); } ?>
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
                                    <h1>SCHOOL BASIC INFORMATION</h1>
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
                            <div class="container">
                                <!-- BEGIN PAGE CONTENT INNER -->
                                <div class="page-content-inner">
                                       <?php $this->load->view('emis_school_profile_header1.php'); ?>
                                    <div class="portlet light portlet-fit ">
                                        <div class="portlet-body">
                                            <div class ="row">
                                                <div class="col-md-4">
                                                    <font style="color:#dd4b39;"><?php echo $this->session->flashdata('errors'); ?></font>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $user_type_id = $this->session->userdata('emis_user_type_id'); ?> 
                                        <div class="form-actions">
                                            <form>
                                                <div class="portlet light portlet-fit ">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-building font-dark"></i>
                                                            <span class="caption-subject font-dark sbold uppercase">School Details - Part V</span>
                                                        </div>
                                                    </div> 
                                                    <div class="portlet-body">
                                                        <div class="form-row">
                                                         <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-gear font-dark"></i>
                                                            <span class="caption-subject font-dark sbold uppercase" style="color: blue !important;">General Physical Facilities and Equipment</span>
                                                        </div>
                                                    </div> 
                                                            <div class="form-group col-md-6">
                                                            <table class="table">
                                                            <tr>
                                                             <th>1. Total area of the land available for school, including building area</th>
                                                              <th><input type="text" id="landdetails_1" name="Landdetails" required="required" class="form-control"></th>
                                                             </tr></table>
                                                           </div>
                                                           
                                                           <div class="form-group col-md-6">
                                                            <table class="table">
                                                            <tr><th>2. Area of the buildings</th>
                                                   
                                                    <th> <input type="text" id="landdetails_2" name="Landdetails" required="required" class="form-control"></th>
                                                             </tr></table>
                                                            
                                                           </div>
                                                        
                                                          
                                                            <div class="form-group col-md-6">
                                                             <table class="table">
                                                                <tr>
                                                                <th>3. Area of Playground</th>
                                                                <th><input type="text" id="landdetails_3" name="Landdetails" required="required" class="form-control"></th>
                                                                 </tr>
                                                                 </table>
                                                           </div>
                                                           
                                                            <div class="form-group col-md-6">
                                                             <table class="table">
                                                            <tr><th>4. Whether land is available for expansion of school facilities</th>
                                                   <th>
                                                             <input type="text" id="landdetails_4" name="Landdetails" required="required" class="form-control"></th>
                                                             </tr></table>
                                                           </div>
                                                           
                                                           <div class="form-group col-md-6">
                                                             <table class="table">
                                                            <tr><th>5.Land owned by</th>
                                                   <th>
                                                             <input type="radio"/><label for="vc_1">Trust</label>
                                                             <input type="radio"/><label for="vc_2">Society</label>
                                                             <input type="radio"/><label for="vc_3">Management</label>
                                                             <input type="radio"/><label for="vc_4">Goverment</label></th>
                                                             </tr></table>
                                                           </div>

                


                                                           <div class="form-group col-md-6">
                                                             <table class="table">
                                                            <tr><th>6.Land Usage</th>
                                                   <th>
                                                              <input type="text" id="landdetails_6" name="Landdetails" required="required" class="form-control"></th>
                                                             </tr></table>
                                                           </div>
                                                           
                                                           
                                                           <div class="form-group col-md-6">
                                                             <table class="table">
                                                            <tr><th>Amount of Rent Per Year</th>
                                                   <th>
                                                             <input type="text" id="landdetails_7" name="Landdetails" required="required" class="form-control"></th>
                                                             </tr></table>
                                                           </div>  
                                                            
                                                            
                                                             <div class="form-group col-md-6">
                                                             <table class="table">
                                                            <tr><th>Period of Lease</th>
                                                   <th>
                                                             <input type="text" id="landdetails_8" name="Landdetails" required="required" class="form-control"></th>
                                                             </tr></table>
                                                           </div>  
                                                            
                                         <div class="form-group col-md-6">
                                                             <table class="table">
                                                            <tr><th>7. Is the Land registered</th>
                                                   <th>
                                                              <input type="radio"/><label for="vc_1">YES</label>
                                                             <input type="radio"/><label for="vc_2">NO</label></th>
                                                             </tr></table>
                                                           </div>  
                                                             
    

                                                            <div class="form-group col-md-6">
                                                             <table class="table">
                                                            <tr><th>8. Are buildings and playground in the same compound?</th>
                                                   <th>
                                                              <input type="radio"/><label for="vc_1">YES</label>
                                                             <input type="radio"/><label for="vc_2">NO</label></th>
                                                             </tr></table>
                                                           </div> 
                                                           

                                                            <div class="form-group col-md-12">
                                                             <table class="table">
                                                            <tr><th>Door Number</th>
                                                            
                                                   <th>
                                                              <input type="text" id="landdetails_11" name="Landdetails" required="required" class="form-control"></th><th>Street Name</th><th><input type="text" id="landdetails_12" name="Landdetails" required="required" class="form-control"></th>
                                                             </tr></table>
                                                           </div> 
                                                            
                                                          <div class="form-group col-md-6">
                                                             <table class="table">
                                                            <tr><th>Number of classes functioning in this address </th>
                                                   <th>
                                                              <input type="text" id="landdetails_13" name="Landdetails" required="required" class="form-control"></th>
                                                             </tr></table>
                                                           </div> 
                                                            
                                                             <div class="form-group col-md-6">
                                                             <table class="table">
                                                            <tr><th>Distance between the main building & playground</th>
                                                   <th>
                                                              <input type="text" id="landdetails_14" name="Landdetails" required="required" class="form-control"></th>
                                                             </tr></table>
                                                           </div> 
                                                           
                                                            
                                                            
                                                            <div class="form-group col-md-6">
                                                             <table class="table">
                                                            <tr><th>Type of Boundary Wall</th>
                                                   <th>
                                                              <input type="text" id="landdetails_15" name="Landdetails" required="required" class="form-control"></th>
                                                             </tr></table>
                                                           </div> 
                                                            
                                                             <div class="form-group col-md-6">
                                                             <table class="table">
                                                            <tr><th>Perimeter of boundary wall in meters</th>
                                                   <th>
                                                              <input type="text" id="landdetails_16" name="Landdetails" required="required" class="form-control"></th>
                                                             </tr></table>
                                                           </div> 
                                                            
                                                            
                                                            
                                                            <div class="form-group col-md-6">
                                                             <table class="table">
                                                            <tr><th>Length of boundary wall in meters</th>
                                                   <th>
                                                              <input type="text" id="landdetails_17" name="Landdetails" required="required" class="form-control"></th>
                                                             </tr></table>
                                                           </div> 
                                                            
                                                           
    
                                                           <div class="form-group col-md-6">
                                                             <table class="table">
                                                            <tr><th>Length of boundary wall in meters</th>
                                                   <th>
                                                               <input type="text" id="landdetails_18" name="Landdetails" required="required" class="form-control"></th>
                                                             </tr></table>
                                                           </div> 

                                                           
                                                            
                                                            
                                                            <div class="form-group col-md-6">
                                                            <table class="table">
                                                            <tr><th>Length of boundary wall in meters</th>
                                                   <th>
                                                   <select class="form-control"><option value="">-----</option></select></th>
                                                             </tr></table>
                                                           </div> 
                                                            
                                                           
    
                                                           <div class="form-group col-md-6">
                                                             <table class="table">
                                                            <tr><th>Type of School building</th>
                                                   <th>
                                                 <select class="form-control"><option value="">-----</option></select></th>
                                                             </tr></table>
                                                           </div> 
                                                            
                                                    </div>
                                                    </div>
                                                            
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                            <button type="reset" class="btn btn-info">Reset</button>
                                                        </div>
                                                    </div>
                                                    <button style="visibility:hidden;">DDDD</button>
                                                </div>
                                            </form>
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
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/global/plugins/moment.min.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/global/plugins/jquery.mockjax.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/address/address.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/global/plugins/bootstrap-typeahead/bootstrap3-typeahead.min.js';?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'asset/global/plugins/select2/js/select2.full.min.js';?>" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <!-- END PAGE LEVEL SCRIPTS --> 
    
    <script>
        document.getElementById('resivisible').style.visibility='hidden';
        document.getElementById('cwsnvisible').style.visibility='hidden';
    </script>
</body>
</html>