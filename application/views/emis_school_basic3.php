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
                                                    <div class="mt-step-title uppercase font-grey-cascade">Basic  </div>
                                                    <div class="mt-step-content font-grey-cascade">Step 1</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Basic/emis_school_basic2';?>"><div class="col-md-2 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">2</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Basic</div>
                                                    <div class="mt-step-content font-grey-cascade">Step 2</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Basic/emis_school_basic3';?>"><div class="col-md-4 bg-grey mt-step-col active">
                                                    <div class="mt-step-number bg-white font-grey">3</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Basic Information</div>
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
                                                    <span class="caption-subject font-dark sbold uppercase">Basic Information step 3</span>

                                                </div>
                                                 <h4 class="pull-right">Bank Details</h4>
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
                                            <div class="portlet-body form">
                                            <form action="<?php echo base_url().'Basic/emis_admin_bank_data_register';?>" method="post" id="emis_bank_reg_form" name="emis_bank_reg_form">
                                              <div class="form-body">
                                               <fieldset id="myFieldset" disabled="disabled">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                      <div class="col-md-12">
                                                         <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Revenue District of the Bank:</label>

                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_prof_bank_district" name="emis_prof_bank_district" required>

                                                                 
                                                                <option value="" >Select District</option>
                                                        <?php foreach($districts as $dis) {   ?>
                                                          <option value="<?php echo $dis->id;  ?>" <?php if($dis->id == $current_district) { ?>  selected <?php }   ?>><?php echo $dis->bank_dist  ?></option>

                                                          <?php   }  ?>
                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_prof_bank_district_alert"></div></font>

                                                    </div>
                                                </div>

                                                    <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Name of the Bank</label>
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_prof_bank_name" name="emis_prof_bank_name" required>

                                                                
                                                                <option value="" >Select Bank</option>
                                                                <?php foreach($banks as $b) {   ?>
                                                          <option value="<?php echo $b->id;  ?>" <?php if($b->id == $current_bank) { ?>  selected <?php }   ?>><?php echo $b->bank  ?></option>
                                                          <?php   }  ?>
                                                             </select>
                                                             <font style="color:#dd4b39;"><div id="emis_prof_bank_name_alert"></div></font>
                                                    </div>
                                                </div>
                                                 
                                                    <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Branch of the Bank: </label>
                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_prof_branch_name" name="emis_prof_branch_name" required>
                                                               
                                                                <option value="" >Select Branch</option>
                                                                <?php foreach($branchs as $b) {   ?>
                                                               <option value="<?php echo $b->id;  ?>" <?php if($b->id == $current_branch) { ?>  selected <?php }   ?>><?php echo $b->branch ?></option>
                                                                 <?php   }  ?>
                                                                 

                                                            </select>
                                                             <font style="color:#dd4b39;"><div id="emis_prof_branch_name_alert"></div></font>
  
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
                                            <div class="portlet-body">
                                                <div class="row" >  
                                                   <div class="col-md-12">
                                                        <table id="user" class="table table-bordered table-striped">
                                                            <tbody>
                                                               
                                                                                                                               <tr>
                                                                    <td style="width:45%"> Bank Account Number: </td>
                                                                    <td style="width:40%">
                                                                        <a href="javascript:;" id="bankaccountno" data-type="text" data-pk="0" data-url="<?php echo base_url().'Basic/updatebankacc';?>"  data-original-title="Enter Account Number"> <?php echo $bankaccno; ?> </a> 
                                                                    </td>
                                                                    <td style="width:15%">

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
        $('#bankaccountno').editable({
            type: 'text',
            pk: 1,
            name: 'bankaccno',
            title: 'Enter Bank Account Number',
            success: function(response, newValue) {

                    var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg; 
                     else
                        toastr.success("Bank Account Number updated sucessfully", "Update Notifications");
            },
            error: function(response, newValue) {

                return 'Service unavailable. Please try later.';
            },
            validate: function(value){
                if(!  /^\d+$/.test(value))
                {
                    return 'Invalid account';
                }
            }
        });

                
        $('#revdistrict').editable({
            inputclass: 'form-control input-medium',
            
        });
         $('#bankname').editable({
            inputclass: 'form-control input-medium',
            
        }); 
        $('#bankbranch').editable({
            inputclass: 'form-control input-medium',
            
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