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
                                                  <a href="<?php echo base_url().'Basic/emis_school_basic1';?>"><div class="col-md-2 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">1</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Basic</div>
                                                    <div class="mt-step-content font-grey-cascade">Step 1</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Basic/emis_school_basic2';?>"><div class="col-md-2 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">2</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Basic</div>
                                                    <div class="mt-step-content font-grey-cascade">Step 2</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Basic/emis_school_basic3';?>"><div class="col-md-2 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">3</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Basic</div>
                                                    <div class="mt-step-content font-grey-cascade">Step 3</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Basic/emis_school_basic4';?>"><div class="col-md-4 bg-grey mt-step-col active">
                                                    <div class="mt-step-number bg-white font-grey">4</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Basic Information</div>
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
                                                    <span class="caption-subject font-dark sbold uppercase">Basic Information step 4</span>
                                                </div>
                                            </div>
                                        <div class="portlet-body">
                                            <div class ="row">
                                                <div class="col-md-4">
                                                <font style="color:#dd4b39;">
                                                    <?php echo $this->session->flashdata('errors'); ?>
                                                </font>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $user_type_id = $this->session->userdata('emis_user_type_id'); ?>
                                        <?php if ($user_type_id != 1 && $user_type_id != 2) { ?>
                                        <div class="portlet-body form">
                                            
                                            <form action="<?php echo base_url().'Basic/emis_admin_school_category_register';?>" method="post" id="emis_bank_reg_form" name="emis_bank_reg_form">
                                              <div class="form-body">
                                              <fieldset id="myFieldset" disabled="disabled">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                      <div class="col-md-12">
                                                         
                                                         <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">School Management Major Category:</label>
                                                        

                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_mangement_maj_cat" name="emis_mangement_maj_cat" required>
                                                                 
                                                                <option value="" >Select Management Category</option>
                                                            <?php foreach($major as $maj) {   ?>
                                                          <option value="<?php echo $maj->id;  ?>" <?php if($maj->id == $current_major) { ?>  selected <?php }   ?>><?php echo $maj->manage_name  ?></option>
                                                            <?php   }  ?>
                                                            </select>
                                                           
                                                             <font style="color:#dd4b39;"><div id="emis_mangement_maj_cat_alert"></div></font>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">School Management Sub Category:</label>
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_mangement_sub_cat" name="emis_mangement_sub_cat" required>
                                                                 
                                                                <option value="" >Select Sub Category</option>
                                                        <?php foreach($sub as $s) {   ?>
                                                          <option value="<?php echo $s->id;  ?>" <?php if($s->id == $current_sub) { ?>  selected <?php }   ?>><?php echo $s->management  ?></option>
                                                          <?php   }  ?>
                                                            </select>
                                                            
                                                             <font style="color:#dd4b39;"><div id="emis_mangement_sub_cat_alert"></div></font>

                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Administrative Directorate / Department </label>
                                                           <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_mangement_directorate" name="emis_mangement_directorate" required>
                                                                 
                                                                <option value="" >Select Directorate/Department</option>
                                                         <?php foreach($dept as $d) {   ?>
                                                          <option value="<?php echo $d->id;  ?>" <?php if($d->id == $current_department) { ?>  selected <?php }   ?>><?php echo $d->department  ?></option>
                                                          <?php   }  ?>
                                                            </select>
                                                           
                                                             <font style="color:#dd4b39;"><div id="emis_mangement_directorate_alert"></div></font>

                                                    </div>
                                                </div>

                                                        
                                                        
                                                        </div>
                                                        </div> 
                                                    
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="row">
                                                                    <div class="col-md-offset-11 col-md-9">
                                                                     <button type="submit" class="btn green" id="emis_bank_data_sub">Submit</button>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                            <div class="col-md-6"> </div>
                                                        </div>
                                                        </fieldset>
                                                    </div>
                                                    
                                            </form>
                                            </div>
                                            <?php } ?>
                                            <div class="portlet-body">
                                            <div class ="row">
                                            <div class="col-md-12">
                                                             <table id="user" class="table table-bordered table-striped">
                                                             <tbody>
                                                             <?php if ($user_type_id == 1 || $user_type_id == 2) { ?> 
                                                             <tr> 
                                                                <td>Select Management Category</td>
                                                                <td><?php echo $current_major_name; ?></td>
                                                                <td><span class="text-muted"> Help text </span></td>
                                                             </tr>
                                                             <tr>
                                                                <td>School Management Sub Category</td>
                                                                <td><?php echo $current_sub_name; ?></td>
                                                                <td><span class="text-muted"> Help text </span></td>
                                                             </tr>
                                                             <tr>
                                                                <td>Administrative Directorate / Department</td>
                                                                <td><?php echo $current_department_name; ?></td>                                                               
                                                                <td><span class="text-muted"> Help text </span></td>
                                                             </tr>
                                                             <?php } ?>
                                                             <?php if ($user_type_id == 1 || $user_type_id == 2) { ?>
                                                             <tr>
                                                                    <td> Category of school</td>
                                                                    <td> <?php echo $current_category_name; ?> </td> 
                                                                     <td>
                                                                        <span class="text-muted"> Help Text </span>
                                                                    </td>

                                                            </tr>
                                                             <?php } else{ ?>
                                                              <tr>
                                                                    <td> Category of school</td>
                                                                    <td>
                                                                        <a href="javascript:;" id="schoolcate" data-type="select2" data-pk="1" data-value="<?php echo $current_category; ?>" data-original-title="Select Category " data-url="<?php echo base_url().'Basic/updateschoolcategory';?>"> </a>
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-muted"> Select2 (dropdown mode) </span>
                                                                    </td>
                                                                </tr>
                                                             <?php } ?>
                                                                <tr>
                                                                    <td> Whether Registered with State Parent Teachers Association (PTA): </td>
                                                                    <td>
                                                                        <a href="javascript:;" id="regstatepta" data-type="select2" data-pk="1" data-value="<?php echo $current_pta; ?>" data-original-title="Select yes or no " data-url="<?php echo base_url().'Basic/updateptaregstate';?>"> </a>
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-muted"> Select2 (dropdown mode) </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:15%"> If Registered - Registration No. in State PTA: </td>
                                                                    <td style="width:50%">

                                                                        <a href="javascript:;" id="regnoinstatepta" data-type="text" data-pk="0" data-url="<?php echo base_url().'Basic/updateptano';?>"  data-original-title="Enter PTA Number"> <?php echo $pta_no; ?> </a> 

                                                                    </td>
                                                                    <td style="width:35%">
                                                                        <span class="text-muted"> Help text </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> Details of the Last Subscription Paid (Academic Year): </td>
                                                                    <td>
                                                                        <a href="javascript:;" id="lastsubscriptionpaid" data-type="select2" data-pk="1" data-value="<?php echo $current_sub_yr; ?>" data-original-title="Select year" data-url="<?php echo base_url().'Basic/updateptayear';?>"> </a>
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-muted"> Select2 (dropdown mode) </span>
                                                                    </td>
                                                                </tr>
                                                             
                                                    
                                                            </tbody>
                                                        </table>
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
        $('#regnoinstatepta').editable({
            type: 'text',
            pk: 1,
            name: 'pta_no',
            title: 'Enter Registration No. in State PTA',
              success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else
                        toastr.success("Registration Number updated sucessfully", "Update Notifications");  
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(! /^\w+$/.test(value))
                {
                    return 'Invalid PTA number';
                }
            }
        });
        $('#drawingofficercode').editable({
            type: 'text',
            pk: 1,
            name: 'draw_off_code',
            title: 'Enter Drawing Officer Code No.',
            success: function(response, newValue) {
                    var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg; 
                     else
                        toastr.success("Drawing Officer Code updated sucessfully", "Update Notifications"); 
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(! /^\w+$/.test(value))
                {
                    return 'Invalid drawing officer code';
                }
            }
        });        


                 var countries = [];
        $.each({
            "AA": "Government",
            "BB": "School Education Department School",
            "CC": "Directorate of School Education",
            "DD": "Hr.Sec School (VI - XII)",
            "EE": "YES",
            "FF": "2015 - 2016",
            "MZ": "Mozambique"
        }, function(k, v) {
            countries.push({
                id: k,
                text: v
            });
        });

        var yesorno = [];
        $.each({
            "Yes": "YES",
            "No": "NO",
        }, function(k, v) {
            yesorno.push({
                id: k,
                text: v
            });
        });

        var currentYear = new Date().getFullYear(), years = [];
        startYear = 1950;
        var tempYear = currentYear + 1 ;
        var prevYear;
        while ( tempYear >= startYear ) {
                    prevYear = tempYear - 1 ;
                    years.push({
                        id: prevYear + "-" + tempYear.toString().substr(-2) ,
                        text: prevYear + "-" + tempYear.toString().substr(-2)
                    });
                    tempYear--;

            } 

        $('#majorcategory').editable({
            inputclass: 'form-control input-medium',
            source: countries
        });
         $('#subcategory').editable({
            inputclass: 'form-control input-medium',
            source: countries
        }); 
        $('#admindirectorate').editable({
            inputclass: 'form-control input-medium',
            source: countries
        });         
        $('#categoryofschool').editable({
            inputclass: 'form-control input-medium',
            source: countries
        });
         $('#regstatepta').editable({
            inputclass: 'form-control input-medium',
            source: yesorno,
            success: function(response, newValue) {
                    var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;  
                     else
                     toastr.success("Regsitration Status updated sucessfully", "Update Notifications"); 
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
        $('#lastsubscriptionpaid').editable({
            inputclass: 'form-control input-medium',
            source: years,
            success: function(response, newValue) {
                    var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else 
                     toastr.success("Subscription year updated sucessfully", "Update Notifications");  
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
        var cate = new Array();
        <?php foreach($category as $k => $v){ ?>
                cate.push({id: '<?php echo $k; ?>', text: '<?php echo $v; ?>'});
            <?php } ?>
       $('#schoolcate').editable({
            inputclass: 'form-control input-medium',
            source: cate,
            success: function(response, newValue) {
                    var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg; 
                     if(result.response_code == 1)  return location.reload(); 
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
                     $("#myFieldset").prop('disabled', function () {
                    return ! $(this).prop('disabled');
                });
            });
</script>

    </body>

</html>