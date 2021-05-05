<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>

        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />



        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

  <?php $this->load->view('header.php'); ?>


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
                                       
                                    <div class="row">
                                                        
                                                   
                                            <div class="col-md-12"><br/>
                                            <span> <i class="fa fa-bank fa-3x font-green-haze"><font style="font-size:25px;font-family: 'open sans';" class="number font-red"> GOVT HSS PANDESWARAM ( 33010902002 )</font></i></span> <hr>

                                            </div>
                                          <ul class="list-inline">
                                         		 <li>
                                                <font style="color:#9b9b9b;"><i class="fa fa-map-marker"></i> Block :</font> 
                                                Villivakkam </li>
                                                <li>
                                                <font style="color:#9b9b9b;"><i class="fa fa-map-marker"></i> Category :</font> 
                                                Hr.Sec School (VI-XII) </li>
                                                <li>
                                                <font style="color:#9b9b9b;"><i class="fa fa-calendar"></i> Management :</font> School Education Department School </li>
                                                <li>
                                                <font style="color:#9b9b9b;"><i class="fa fa-briefcase"></i> Directorate :</font> Directorate of School Education </li>
                                            </ul><br/>
                                        </div>
                                        

                                           <!-- <div class="m-heading-1 border-green m-bordered">
                                            <h3>Basic Information</h3>
                                        </div> -->
                                         <div class="portlet-body">
                                         <div class="mt-element-step">
                                            <div class="row step-thin">
                                                <a href="<?php echo base_url().'Admin/emis_school_admin1';?>"><div class="col-md-1 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">1</div>

                                                </div></a>
                                                <a href="<?php echo base_url().'Admin/emis_school_admin2';?>"><div class="col-md-6 bg-grey mt-step-col active">
                                                    <div class="mt-step-number bg-white font-grey">2</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Administrative Information</div>
                                                    <div class="mt-step-content font-grey-cascade">Step 2</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Admin/emis_school_admin3';?>"><div class="col-md-1 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">3</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Admin/emis_school_admin4';?>"><div class="col-md-1 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">4</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Admin/emis_school_admin5';?>"><div class="col-md-1 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">5</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Admin/emis_school_admin6';?>"><div class="col-md-1 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">6</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Admin/emis_school_admin7';?>"><div class="col-md-1 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">7</div>
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
                                                    <span class="caption-subject font-dark sbold uppercase">Administrative Information step 2</span>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table id="user" class="table table-bordered table-striped">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width:15%"> G.O. No. & Date by which the School was Sanctioned (Upto X Standard): </td>
                                                                    <td style="width:50%">
                                                                        <a href="javascript:;" id="sanctionedsslc" data-type="text" data-pk="0" data-url="<?php echo base_url().'Admin/updategoanddate';?>"  data-original-title="Enter username"> <?php echo $start_order; ?> </a> 
                                                                    </td>
                                                                    <td style="width:35%">
                                                                        <span class="text-muted"> Help text </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:15%"> Year of School Started: </td>
                                                                    <td style="width:50%">
                                                                        <a href="javascript:;" id="starteddate" data-type="text" data-pk="0" data-url="<?php echo base_url().'Admin/updateshoolstartyear';?>"  data-original-title="Enter username"> <?php echo $start_yr; ?> </a> 
                                                                    </td>
                                                                    <td style="width:35%">
                                                                        <span class="text-muted"> Help text </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:15%"> G.O. No. & Date by which the School was sanctioned Higher Secondary Sections (+1,+2): </td>
                                                                    <td style="width:50%">
                                                                        <a href="javascript:;" id="sanctionedhsc" data-type="text" data-pk="0" data-url="<?php echo base_url().'Admin/updategoanddate2';?>"  data-original-title="Enter username"> <?php echo $hssstart_order; ?> </a> 
                                                                    </td>
                                                                    <td style="width:35%">
                                                                        <span class="text-muted"> Help text </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:15%"> Year of Higher Secondary Sections Started:(+1,+2): </td>
                                                                    <td style="width:50%">
                                                                        <a href="javascript:;" id="hscstarteddate" data-type="text" data-pk="0" data-url="<?php echo base_url().'Admin/updatehighyear';?>"  data-original-title="Enter username"> <?php echo $hssstart_yr; ?> </a> 
                                                                    </td>
                                                                    <td style="width:35%">
                                                                        <span class="text-muted"> Help text </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:15%"> Details of upgradation of School: (Short Details with Order No. & Date - max 200 Characters): </td>
                                                                    <td style="width:50%">
                                                                        <a href="javascript:;" id="upgradationdetails" data-type="text" data-pk="0" data-url="<?php echo base_url().'Admin/updateupgradedetails';?>"  data-original-title="Enter username"><?php echo $upgr_det; ?>  </a> 
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
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/select2/js/select2.full.min.js';?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        

         <script>
        $('#sanctionedsslc').editable({
            type: 'text',
            pk: 1,
            name: 'start_order',
            title: 'Enter G.O. No. & Date',
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             }/*,
            validate: function(value){
                if(! /^\d+$/.test(value))
                {
                    return 'Invalid school id';
                }
            } */
        });
        $('#starteddate').editable({
            type: 'text',
            pk: 1,
            name: 'start_yr',
            title: 'Enter year',
            success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
             validate: function(value){
                if(! /^(19|20)\d{2}$/.test(value))
                {
                    return 'Invalid year';
                }
            }
        });        
        $('#sanctionedhsc').editable({
            type: 'text',
            pk: 1,
            name: 'hssstart_order',
            title: 'Enter G.O. No. & Date',
            success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             }/*,
            validate: function(value){
                if(! /^\d+$/.test(value))
                {
                    return 'Invalid school id';
                }
            } */
        });
        $('#hscstarteddate').editable({
            type: 'text',
            pk: 1,
            name: 'hssstart_yr',
            title: 'Enter year',
            success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(! /^(19|20)\d{2}$/.test(value))
                {
                    return 'Invalid year';
                }
            }
        });        
        $('#upgradationdetails').editable({
            type: 'text',
            pk: 1,
            name: 'upgr_det',
            title: 'Enter upgradation details',
            success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             }/*,
            validate: function(value){
                if(! /^\d+$/.test(value))
                {
                    return 'Invalid school id';
                }
            } */
        });  

            // init editable toggler
            $('#enable').click(function() {
                $('#user .editable').editable('toggleDisabled');
            });


</script>

    </body>

</html>