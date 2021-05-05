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
                                        <h1>Profile
                                            <small>School profile edit and update</small>
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
                                       
   <?php $this->load->view('emis_school_profile_header1.php'); ?>
                                        

                                           <!-- <div class="m-heading-1 border-green m-bordered">
                                            <h3>Basic Information</h3>
                                        </div> -->
                                         <div class="portlet-body">
                                         <div class="mt-element-step">
                                            <div class="row step-thin">
                                                  <a href="<?php echo base_url().'Basic/emis_school_basic1';?>"><div class="col-md-2 bg-grey mt-step-col ">
                                                    <div class="mt-step-number bg-white font-grey">1</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Basic</div>
                                                    <div class="mt-step-content font-grey-cascade">Step 1</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Basic/emis_school_basic2';?>"><div class="col-md-4 bg-grey mt-step-col active">
                                                    <div class="mt-step-number bg-white font-grey">2</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Basic Information</div>
                                                    <div class="mt-step-content font-grey-cascade">Step 2</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Basic/emis_school_basic3';?>"><div class="col-md-2 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">3</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Basic</div>
                                                    <div class="mt-step-content font-grey-cascade">Step 3</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Basic/emis_school_basic4';?>"><div class="col-md-2 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">4</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Basic</div>
                                                    <div class="mt-step-content font-grey-cascade">Step 4</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Basic/emis_school_basic5';?>"><div class="col-md-2 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">5</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Basic</div>
                                                    <div class="mt-step-content font-grey-cascade">Step 5</div>
                                                </div></a>
                                            </div>
                                         </div>
                                         </div>
                                         

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mt-checkbox-inline">
                                                    <!-- <label class="mt-checkbox mt-checkbox-outline">
                                                        <input type="checkbox" id="autoopen">&nbsp;Auto-open next field
                                                        <span></span>
                                                    </label> -->
                                                   <!--  <label class="mt-checkbox mt-checkbox-outline">
                                                        <input type="checkbox" id="inline">&nbsp;Inline editing
                                                        <span></span>
                                                    </label> -->
                                                    <button id="enable" class="btn green">Enable / Disable Editor Mode</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">Basic Information step 2</span>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table id="user" class="table table-bordered table-striped">
                                                            <tbody>
                                                                 <tr>
                                                                    <td style="width:15%"> Address of the School: </td>
                                                                    <td style="width:50%">
                                                                        <a href="javascript:;" id="schooladdress" data-type="text" data-pk="0" data-url="<?php echo base_url().'Basic/updateaddress';?>"  data-original-title="Enter Address"> <?php echo $address; ?> </a> 
                                                                    </td>
                                                                    <td style="width:35%">
                                                                        <span class="text-muted"> Help text </span>
                                                                    </td>
                                                                </tr>
                                                               <tr>
                                                                    <td style="width:15%"> Pincode : </td>
                                                                    <td style="width:50%">
                                                                        <a href="javascript:;" id="pincode" data-type="text" data-pk="0" data-url="<?php echo base_url().'Basic/updatepincode';?>"  data-original-title="Enter Pincode"> <?php echo $pincode; ?> </a> 
                                                                    </td>
                                                                    <td style="width:35%">
                                                                        <span class="text-muted"> Help text </span>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td> STD code : </td>
                                                                    <td>
                                                                        <a href="javascript:;" id="stdcode" data-type="select2"data-pk="1" data-value="<?php echo $current_std_id; ?>" " data-original-title="Select Std code" data-url="<?php echo base_url().'Basic/updatestd';?>"> </a>
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-muted"> Select2 (dropdown mode) </span>
                                                                    </td>
                                                                </tr>
                                                                 <tr>
                                                                    <td style="width:15%"> Schools's Landline Phone No.: </td>
                                                                    <td style="width:50%">
                                                                        <a href="javascript:;" id="landline1" data-type="text" data-pk="0" data-url="<?php echo base_url().'Basic/updatelandline';?>"  data-original-title="Enter Landline"> <?php echo $landline; ?> </a> 
                                                                    </td>
                                                                    <td style="width:35%">
                                                                        <span class="text-muted"> Help text </span>
                                                                    </td>
                                                                </tr>
                                                               <tr>
                                                                    <td style="width:15%"> Another Landline No. (If exist): </td>
                                                                    <td style="width:50%">
                                                                        <a href="javascript:;" id="landline2" data-type="text" data-pk="0" data-url="<?php echo base_url().'Basic/updatelandline2';?>"  data-original-title="Enter Landline"> <?php echo $landline2; ?> </a> 
                                                                    </td>
                                                                    <td style="width:35%">
                                                                        <span class="text-muted"> Help text </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:15%"> Headmaster's Mobile Number : </td>
                                                                    <td style="width:50%">
                                                                        <a href="javascript:;" id="headmastermobile" data-type="text" data-pk="0" data-url="<?php echo base_url().'Basic/updatemobile';?>"  data-original-title="Enter Mobile"><?php echo $mobile; ?>  </a> 
                                                                    </td>
                                                                    <td style="width:35%">
                                                                        <span class="text-muted"> Help text </span>
                                                                    </td>
                                                                </tr>
                                                               <tr>
                                                                    <td style="width:15%"> School's e-mail id : </td>
                                                                    <td style="width:50%">
                                                                        <a href="javascript:;" id="schoolmailid" data-type="text" data-pk="0" data-url="<?php echo base_url().'Basic/updateemail';?>"  data-original-title="Enter Email ID"> <?php echo $sch_email; ?> </a> 
                                                                    </td>
                                                                    <td style="width:35%">
                                                                        <span class="text-muted"> Help text </span>
                                                                    </td>
                                                                </tr> 
                                                                 <tr>
                                                                    <td style="width:15%"> Website (if any): </td>
                                                                    <td style="width:50%">
                                                                        <a href="javascript:;" id="website" data-type="text" data-pk="0" data-url="<?php echo base_url().'Basic/updatewebsite';?>"  data-original-title="Enter Website"> <?php echo $website; ?> </a> 
                                                                    </td>
                                                                    <td style="width:35%">
                                                                        <span class="text-muted"> Help text </span>
                                                                    </td>
                                                                </tr>  
                     
                                                            </tbody>
                                                        </table>
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
          
        $('#schooladdress').editable({
            type: 'text',
            pk: 1,
            name: 'address',
            title: 'Enter School Address',
              success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else
                        toastr.success("School Address updated sucessfully", "Update Notifications");
  
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if( /[^-.?!,;:()&'/ A-Za-z0-9]/.test(value))
                {
                    return 'Invalid address';
                }
            }
        });
        $('#pincode').editable({
            type: 'text',
            pk: 1,
            name: 'pincode',
            title: 'Enter pincode',
            success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg; 
                     else
                        toastr.success("Pincode updated sucessfully", "Update Notifications");

            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(!  /^(6|5)\d{5}$/.test(value))
                {
                    return 'Invalid pin code';
                }
            }

        });        
        $('#landline1').editable({
            type: 'text',
            pk: 1,
            name: 'landline',
            title: 'Enter Landline Number 1',
            success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;  
                     else
                        toastr.success("Land Line updated sucessfully", "Update Notifications");

            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(! /^\d{6,8}$/.test(value))
                {
                    return 'Invalid landline number';
                }
            }

        });
            $('#landline2').editable({
            type: 'text',
            pk: 1,
            name: 'landline2',
            title: 'Enter Landline Number 2',
            success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg; 
                     else
                        toastr.success("Land Line updated sucessfully", "Update Notifications");

                },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(! /^\d{6,8}$/.test(value))
                {
                    return 'Invalid landline number';
                }
            }
        });
        $('#headmastermobile').editable({
            type: 'text',
            pk: 1,
            name: 'mobile',
            title: 'Enter Headmaster mobile number',
            success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg; 
                     else
                        toastr.success("Mobile Number updated sucessfully", "Update Notifications");
 
                },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(! /^\d{10}$/.test(value))
                {
                    return 'Invalid Mobile Number';
                }
            }
        });        
        $('#schoolmailid').editable({
            type: 'text',
            pk: 1,
            name: 'sch_email',
            title: 'Enter School Email id',
            success: function(response, newValue) {
                    var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg; 
                     else
                        toastr.success("Email ID updated sucessfully", "Update Notifications");

                },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(! /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value))
                {
                    return 'Invalid Email id';
                }
            }
        });
        $('#website').editable({
            type: 'text',
            pk: 1,
            name: 'website',
            title: 'Enter Website URL',
            success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg; 
                     else
                        toastr.success("Website updated sucessfully", "Update Notifications");

                },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(! /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/.test(value))
                {
                    return 'Invalid website';
                }
            }
        });        


        var stdcode = new Array();
        <?php foreach($std_details as $k => $v){ ?>
                stdcode.push({id: '<?php echo $k; ?>', text: '<?php echo $v; ?>'});
            <?php } ?>

        $('#stdcode').editable({
            inputclass: 'form-control input-medium',
            source: stdcode,
            success: function(response, newValue) {
                var result = $.parseJSON(response);
                if(result.response_code != 1) return result.error_msg; 
                else
                 toastr.success("STD code updated sucessfully", "Update Notifications");
 
            },
            error: function(response, newValue) {
                return 'Service unavailable. Please try later.';
             },
            validate: function(value){
               if(! value.trim())
                {
                    return 'Empty value not allowed';
                }
            }
        });  

            $('#user .editable').editable('toggleDisabled');
                    // init editable toggler
            $('#enable').click(function() {
                $('#user .editable').editable('toggleDisabled');
            });
</script>

    </body>

</html>