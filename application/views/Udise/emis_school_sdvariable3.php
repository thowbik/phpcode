<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>

        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />

        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->

        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />


        <style type="text/css">
            label.error { float: none; color:#dd4b39; }
         </style>

        </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            
<?php if($this->session->userdata('emis_user_type_id') == 3 )  {?>
<?php $this->load->view('district/header.php'); }else if($this->session->userdata('emis_user_type_id') == 2) { ?>
<?php $this->load->view('block/header.php'); }else{ ?>
<?php $this->load->view('header.php'); }?>
  <?php $is_high_class = $this->session->userdata('emis_school_highclass'); ?>

                


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
                                        <h1>State Defined variables
                                            <small>School edit and update</small>
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
                                                <a href="<?php echo base_url().'Udise_sdvariable/emis_school_sdvariable1';?>"><div class="col-md-4 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">1</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">State Defined</div>
                                                    <div class="mt-step-content font-grey-cascade">Variables</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Udise_sdvariable/emis_school_sdvariable2';?>"><div class="col-md-4 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">2</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">State Defined</div>
                                                    <div class="mt-step-content font-grey-cascade">Variables</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Udise_sdvariable/emis_school_sdvariable3';?>"><div class="col-md-4 bg-grey mt-step-col active">
                                                    <div class="mt-step-number bg-white font-grey">3</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">State Defined</div>
                                                    <div class="mt-step-content font-grey-cascade">Variables</div>
                                                </div></a>
                                            </div>
                                         </div>
                                         </div>
                                         

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mt-checkbox-inline">
                                                    <button id="enable" class="btn green">Enable / Disable Editor Mode</button>
                                                </div>
                                            </div>
                                        </div>
                                        


                                        <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">State Defined variables step 3</span> - <small>Parameters applicable for Government/Pvt. Aided/ Pvt.Unaided Schools</small>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table id="user" class="table table-bordered table-striped">
                                                            <tbody>
                                                                <tr>
                                                                        <td class="col-md-6">Whether the school has been provided with napkin vending machine</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_providednapkinvendingmachine" data-type="select2" data-pk="1" data-url="<?php echo base_url().'Udise_sdvariable/updateemis_school_sdvariables_providednapkinvendingmachine';?>" data-value="<?php echo $schlprvd_npknvenmchn; ?>" data-original-title="Select the option"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                        <td>No of Toilets units constructed by PSU under CSR</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_nooftoiletunitsconstrcutedpsuundercsr" data-type="text" data-pk="1" data-url="<?php echo base_url().'Udise_sdvariable/updateemis_school_sdvariables_nooftoiletunitsconstrcutedpsuundercsr';?>" data-value="<?php echo $toiltsconstrc_psucsr; ?>"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                        <td>No of Toilets units constructed by RD</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_nooftoiletunitsconstrcutedrd" data-type="text" data-pk="1" data-url="<?php echo base_url().'Udise_sdvariable/updateemis_school_sdvariables_nooftoiletunitsconstrcutedrd';?>" data-value="<?php echo $toiltsconstrc_rd;?>" data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                        <td>No of Toilets units constructed by NABARD</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_nooftoiletunitsconstrcutednabard" data-type="text" data-pk="1" data-url="<?php echo base_url().'Udise_sdvariable/updateemis_school_sdvariables_nooftoiletunitsconstrcutednabard';?>" data-value="<?php echo $toiltsconstrc_nabard;?>" data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                        <td>No of Toilets units constructed by SSA</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_nooftoiletunitsconstrcutedssa" data-type="text" data-pk="1" data-url="<?php echo base_url().'Udise_sdvariable/updateemis_school_sdvariables_nooftoiletunitsconstrcutedssa';?>" data-value="<?php echo $toiltsconstrc_ssa;?>"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>


                                                                <tr>
                                                                        <td>No of Toilets units constructed by RMSA</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_nooftoiletunitsconstrcutedrmsa" data-type="text" data-pk="1" data-url="<?php echo base_url().'Udise_sdvariable/updateemis_school_sdvariables_nooftoiletunitsconstrcutedrmsa';?>" data-value="<?php echo $toiltsconstrc_rmsa;?>" data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>


                                                                <tr>
                                                                        <td>No of Toilets units constructed by Others</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_nooftoiletunitsconstrcutedothers" data-type="text" data-pk="1" data-url="<?php echo base_url().'Udise_sdvariable/updateemis_school_sdvariables_nooftoiletunitsconstrcutedothers';?>" data-value="<?php echo $toiltsconstrc_othrs;?>"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>


                                                                <tr>
                                                                        <td>Whether the School has been provided with Air purifier</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_schlhasbeenprovidedwithairpurifier" data-type="select2" data-pk="1" data-url="<?php echo base_url().'Udise_sdvariable/updateemis_school_sdvariables_schlhasbeenprovidedwithairpurifier';?>" data-value="<?php echo $schlprvd_airpurif;?>"  data-original-title="Select the option"></a>
                                                                        </td>
                                                                </tr>


                                                                <tr>
                                                                        <td>Is the sanitary worker engaged to clean the toilets</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_sanitaryworkerengagedtocleantoilets" data-type="select2" data-pk="1" data-url="<?php echo base_url().'Udise_sdvariable/updateemis_school_sdvariables_sanitaryworkerengagedtocleantoilets';?>" data-value="<?php echo $santrywrkrengedcl_tolts;?>" data-original-title="Select the option"></a>
                                                                        </td>
                                                                </tr>


                                                                <tr>
                                                                        <td colspan="2"><b>For Garden Formation does the School have (Only for Middle/ High / Higher Secondary)</b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        Land (Minimum 2 to 3 Cents)
                                                                    </td>
                                                                    <td>
                                                                        <a href="javascript:;" id="emis_school_sdvariables_gardenformationlandmin2to3cents" data-type="select2" data-pk="1" data-url="<?php echo base_url().'Udise_sdvariable/updateemis_school_sdvariables_gardenformationlandmin2to3cents';?>" data-value="<?php echo $land_min2t3cnts;?>" data-original-title="Select the option"></a>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>
                                                                        Sufficient Water Facilities for Graden Maintenance
                                                                    </td>
                                                                    <td>
                                                                        <a href="javascript:;" id="emis_school_sdvariables_sufficentwaterfacforgardenmaintenance" data-type="select2" data-pk="1" data-url="<?php echo base_url().'Udise_sdvariable/updateemis_school_sdvariables_sufficentwaterfacforgardenmaintenance';?>" data-value="<?php echo $sufficntwatfac_garmntence;?>" data-original-title="Select the option"></a>
                                                                    </td>
                                                                </tr>
                                                               
                                                            </tbody>
                                                        </table>
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>



                                        <div class="portlet light portlet-fit ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">State Defined variables step 3
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                 <!-- error reporting start -->
                                                       <?php if ($this->session->flashdata('sdvar')){ ?> 
                                                <!-- BEGIN PAGE CONTENT INNER -->
                                                   <div class="page-content-inner">
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="note note-danger note-bordered">
                                                               <?php echo $this->session->flashdata('sdvar'); ?>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                <!-- END PAGE CONTENT INNER -->
                                             <?php } ?>
                                             <!-- error reporting End -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                      <form id="sdvariable3form1" method="post" action="<?php echo base_url().'Udise_sdvariable/updatesdvariablefrm' ?>">
                                                        <table id="user" class="table table-bordered table-striped">
                                                            <tbody>
                                                                <tr>
                                                                    <td><b>TV/DVD available</b></td>
                                                                    <td>
                                                                        <select class="form-control" name="tvordvdselect" id="tvordvdselect">
                                                                            <option selected="selected" value="">Select the option</option>
                                                                            <option value="1">Yes</option>
                                                                            <option value="2">No</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr style="display: none;" id="tvordvdrow">
                                                                    <td>Whether supplied by SSA</td>
                                                                    <td>
                                                                        <select class="form-control" name="tvordvdsuppliedbyssa" id="tvordvdsuppliedbyssa">
                                                                            <option selected="selected" value="">Select the option</option>
                                                                            <option value="1">Yes</option>
                                                                            <option value="2">No</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td><b>Whether the school has been provided with Broadband Internet facility</b></td>
                                                                    <td>
                                                                        <select class="form-control" name="schlprovidedwithbroadbandinternetfacility" id="schlprovidedwithbroadbandinternetfacility">
                                                                            <option selected="selected" value="">Select the option</option>
                                                                            <option value="1">Yes</option>
                                                                            <option value="2">No</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr style="display: none;" id="internetfacilityhasprovidedyesrow">
                                                                    <td>Internet facility has been provided By</td>
                                                                    <td>
                                                                        <select class="form-control" name="internetfacilityhasprovidedyes" id="internetfacilityhasprovidedyes">
                                                                            <option selected="selected" value="">Select the option</option>
                                                                            <option value="1">SSA</option>
                                                                            <option value="2">DSE</option>
                                                                            <option value="3">DEE</option>
                                                                            <option value="4">RMSA</option>
                                                                            <option value="5">Others</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td><b>Whether Incinerator is available in the Girls toilet</b></td>
                                                                    <td>
                                                                        <select class="form-control" name="incineratoravailingilrstoilsselect" id="incineratoravailingilrstoilsselect">
                                                                            <option selected="selected" value="">Select the option</option>
                                                                            <option value="1">Yes</option>
                                                                            <option value="2">No</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr style="display: none;" id="installationiselectricalormanualrow">
                                                                    <td>Whether the installation is electrical or manual</td>
                                                                    <td>
                                                                        <select class="form-control" name="installationiselectricalormanual" id="installationiselectricalormanual">
                                                                            <option selected="selected" value="">Select the option</option>
                                                                            <option value="1">Electrical</option>
                                                                            <option value="2">Manual</option>
                                                                            <option value="3">Not applicable</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td><b>Are ramps available in all usable buildings</b></td>
                                                                    <td>
                                                                        <select class="form-control" name="rampsavailinallusablebuildingselect" id="rampsavailinallusablebuildingselect">
                                                                            <option selected="selected" value="">Select the option</option>
                                                                            <option value="1">Yes</option>
                                                                            <option value="2">No</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr style="display: none;" id="numberoframpsrequiredrow">
                                                                    <td>Number of ramps required</td>
                                                                    <td>
                                                                        
                                                                        <input type="text" id="nooframpsrequired" name="nooframpsrequired" class="form-control" maxlength="2">
                                                                    </td>
                                                                </tr>
                                                               
                                                            </tbody>
                                                        </table>
                                                        <div class="row"> 
                                                            <center><input type="submit" value="submit" name="" class="btn btn green"></center>
                                                        </div>
                                                        </form>
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
        
        <!-- BEGIN PAGE LEVEL SCRIPTS -->


        <script src="<?php echo base_url().'asset/global/scripts/datatable.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.js" type="text/javascript';?>"></script>
        <script src="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/pages/scripts/table-datatables-colreorder.min.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/global/plugins/jquery.validate.min.js';?>"></script>
        <!-- END PAGE LEVEL SCRIPTS -->



         <script>

            var sdvariablesyesorno = [];
        $.each({
            "1": "Yes",
            "2": "No",
        }, function(k, v) {
            sdvariablesyesorno.push({
                id: k,
                text: v
            });
        });
      

        $('#emis_school_sdvariables_providednapkinvendingmachine').editable({
            inputclass: 'form-control input-medium',
            source: sdvariablesyesorno,
            success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                    else 
                     toastr.success("school has been provided with napkin vending machine Updated sucessfully", "Update Notifications");
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(value != "1" && value != "2")
                {
                     return 'Required Field';

                }
            }
        });


       $('#emis_school_sdvariables_nooftoiletunitsconstrcutedpsuundercsr').editable({
            type: 'text',
            // pk: 1,
            // name: 'nooftoiletunitsconstrcutedpsuundercsr',
            // title: 'Enter the count',
            success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                    else 
                     toastr.success("No of Toilets units constructed by PSU under CSR Updated sucessfully", "Update Notifications");
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,4}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 4 characters';
                       }
                   }
            });


        $('#emis_school_sdvariables_nooftoiletunitsconstrcutedrd').editable({
            type: 'text',
            // pk: 1,
            // name: 'nooftoiletunitsconstrcutedrd',
            // title: 'Enter the count',
            success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                    else 
                     toastr.success("No of Toilets units constructed by RD Updated sucessfully", "Update Notifications");
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,4}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 4 characters';
                       }
                   }
            });



        $('#emis_school_sdvariables_nooftoiletunitsconstrcutednabard').editable({
            type: 'text',
            // pk: 1,
            // name: 'nooftoiletunitsconstrcutednabard',
            // title: 'Enter the count',
            success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                    else 
                     toastr.success("No of Toilets units constructed by NABARD Updated sucessfully", "Update Notifications");
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,4}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 4 characters';
                       }
                   }
            });


        $('#emis_school_sdvariables_nooftoiletunitsconstrcutedssa').editable({
            type: 'text',
            // pk: 1,
            // name: 'nooftoiletunitsconstrcutedssa',
            // title: 'Enter the count',
            success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                    else 
                     toastr.success("No of Toilets units constructed by SSA Updated sucessfully", "Update Notifications");
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,4}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 4 characters';
                       }
                   }
            });
            

    
        $('#emis_school_sdvariables_nooftoiletunitsconstrcutedrmsa').editable({
            type: 'text',
            // pk: 1,
            // name: 'nooftoiletunitsconstrcutedrmsa',
            // title: 'Enter the count',
            success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                    else 
                     toastr.success("No of Toilets units constructed by RMSA Updated sucessfully", "Update Notifications");
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,4}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 4 characters';
                       }
                   }
            });


        $('#emis_school_sdvariables_nooftoiletunitsconstrcutedothers').editable({
            type: 'text',
            // pk: 1,
            // name: 'nooftoiletunitsconstrcutedothers',
            // title: 'Enter the count',
            success: function(response, newValue) {
                     var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                    else 
                     toastr.success("No of Toilets units constructed by Others Updated sucessfully", "Update Notifications");
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,4}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 4 characters';
                       }
                   }
            });

        

        $('#emis_school_sdvariables_schlhasbeenprovidedwithairpurifier').editable({
            inputclass: 'form-control input-medium',
            source: sdvariablesyesorno,
            success: function(response, newValue) {
            var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                    else 
                     toastr.success("School has been provided with Air purifier Updated sucessfully", "Update Notifications");
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(value != "1" && value != "2")
                {
                     return 'Required Field';

                }
            }
        });


        
        $('#emis_school_sdvariables_sanitaryworkerengagedtocleantoilets').editable({
            inputclass: 'form-control input-medium',
            source: sdvariablesyesorno,
            success: function(response, newValue) {
            var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                    else 
                     toastr.success("sanitary worker engaged to clean the toilets Updated sucessfully", "Update Notifications");
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(value != "1" && value != "2")
                {
                     return 'Required Field';

                }
            }
        });




        $('#emis_school_sdvariables_gardenformationlandmin2to3cents').editable({
            inputclass: 'form-control input-medium',
            source: sdvariablesyesorno,
            success: function(response, newValue) {
            var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                    else 
                     toastr.success("Land (Minimum 2 to 3 Cents) Updated sucessfully", "Update Notifications");
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(value != "1" && value != "2")
                {
                     return 'Required Field';

                }
            }
        });






        $('#emis_school_sdvariables_sufficentwaterfacforgardenmaintenance').editable({
            inputclass: 'form-control input-medium',
            source: sdvariablesyesorno,
            success: function(response, newValue) {
            var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                    else 
                     toastr.success("Sufficient Water Facilities for Graden Maintenance  Updated sucessfully", "Update Notifications");
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(value != "1" && value != "2")
                {
                     return 'Required Field';

                }
            }
        });


        

                      
                          // jquery for enable and disable the textbox
               $('#user .editable').editable('toggleDisabled');
               
                   // init editable toggler
                   $('#enable').click(function() {
                       $('#user .editable').editable('toggleDisabled');
                       $("#myFieldset").prop('disabled', function () {
                           return ! $(this).prop('disabled');
                           });
                       $("input").prop('disabled',function(){
                           return ! $(this).prop('disabled');
                       });

                     $("select").prop('disabled',function(){
                           return ! $(this).prop('disabled');
                       });
                   });
               
               $(document).ready(function(){
                   $("input").prop("disabled",true);
               });
               $(document).ready(function(){
                            $("select").prop("disabled",true);
                      });
                    
            

            // // init editable toggler
            //  $('#user .editable').editable('toggleDisabled');
            // $('#enable').click(function() {
            //     $('#user .editable').editable('toggleDisabled');
            // });



            // admin page5 js validations
$("#sdvariable3form1").validate({

    
    rules: {
        tvordvdselect:{
            required:true,
            customvalidationselectfield:true
        },
        tvordvdsuppliedbyssa:{
            required:true,
            customvalidationselectfield:true
        },
        schlprovidedwithbroadbandinternetfacility:{
            required:true,
            customvalidationselectfield:true
        },
        internetfacilityhasprovidedyes:{
            required:true,
            customvalidationselectfield:true
        },
        incineratoravailingilrstoilsselect:{
            required:true,
            customvalidationselectfield:true
        },
        installationiselectricalormanual:{
            required:true,
            customvalidationselectfield:true
        },
        rampsavailinallusablebuildingselect:{
            required:true,
            customvalidationselectfield:true
        },
        nooframpsrequired:{
            required:true,
            customvalidation:true,
            maxlength:2
        }
       
        },
        
             onfocusout: function(element) {
            this.element(element);
        }





        
   });

$.validator.addMethod("customvalidationselectfield",
               function(){
               return $('').val()!="none";
            }
    );

$.validator.addMethod("customvalidation",
               function(value,element){
                     return /^[0-9]+$/.test(value);
               },
               "Allowed number value only"
      );


           
       
        $("#tvordvdselect").change(function () {
            if ($(this).val() == "1") {
                $("#tvordvdrow").show();
            } else {
                $("#tvordvdrow").hide();
            }

            $('#tvordvdsuppliedbyssa').val(function () {
                return $(this).find('option').filter(function () {
                return $(this).prop('defaultSelected');
                }).val();
            });
        });

        $("#schlprovidedwithbroadbandinternetfacility").change(function () {
            if ($(this).val() == "1") {
                $("#internetfacilityhasprovidedyesrow").show();
            } else {
                $("#internetfacilityhasprovidedyesrow").hide();
            }

            $('#internetfacilityhasprovidedyes').val(function () {
                return $(this).find('option').filter(function () {
                return $(this).prop('defaultSelected');
                }).val();
            });
        });


        $("#incineratoravailingilrstoilsselect").change(function () {
            if ($(this).val() == "1") {
                $("#installationiselectricalormanualrow").show();
            } else {
                $("#installationiselectricalormanualrow").hide();
            }

            $('#installationiselectricalormanual').val(function () {
                return $(this).find('option').filter(function () {
                return $(this).prop('defaultSelected');
                }).val();
            });
        });


        $("#rampsavailinallusablebuildingselect").change(function () {
            if ($(this).val() == "2") {
                $("#numberoframpsrequiredrow").show();
            } else {
                $("#numberoframpsrequiredrow").hide();
            }

            $('#nooframpsrequired').val('');
        });

</script>
        
            <?php 
                $tvordvdselect                             = $tvdvd_avail;
                $schlprovidedwithbroadbandinternetfacility = $schlhv_brdbndintrntfac;
                $incineratoravailingilrstoilsselect        = $incinrtravail_glstoilt;
                $rampsavailinallusablebuildingselect       = $rampsavail_usbuldngs;
            ?>

            <script type="text/javascript">
                // set1
                $("#tvordvdselect").val(<?php echo $tvordvdselect; ?>);
                $("#tvordvdsuppliedbyssa").val(<?php echo $supld_ssa; ?>);


                // set2
                $("#schlprovidedwithbroadbandinternetfacility").val(<?php echo $schlprovidedwithbroadbandinternetfacility; ?>);
                $("#internetfacilityhasprovidedyes").val(<?php echo $intrntfac_prvdby; ?>);


                // set3
                $("#incineratoravailingilrstoilsselect").val(<?php echo $incineratoravailingilrstoilsselect; ?>);
                $("#installationiselectricalormanual").val(<?php echo $instltin_electormanl; ?>);


                // set4
                $("#rampsavailinallusablebuildingselect").val(<?php echo $rampsavailinallusablebuildingselect; ?>);
                $("#nooframpsrequired").val(<?php echo $nooframps_req; ?>);


            </script>

        <!-- option1 -->
            <?php 
                     if ($tvordvdselect=="1") {
                ?>
                  <script type="text/javascript">
                        $('#tvordvdrow').show();
                        $("#tvordvdselect").change(function() {
                              if ($('#tvordvdselect').val()=='1') {
                                       // option1
                                       $("#tvordvdsuppliedbyssa").val(<?php echo $supld_ssa; ?>);
                              }
                              else{ 
                                       $('#tvordvdsuppliedbyssa').val(function () {
                                       return $(this).find('option').filter(function () {
                                       return $(this).prop('defaultSelected');
                                             }).val();
                                       });
                                            
                              } 
                            
                            });

          
                  </script>

        <!-- option1 ending -->
             <?php } ?>

        <!-- option2 -->
            <?php 
                     if ($schlprovidedwithbroadbandinternetfacility=="1") {
                ?>
                  <script type="text/javascript">
                        $('#internetfacilityhasprovidedyesrow').show();
                        $("#schlprovidedwithbroadbandinternetfacility").change(function() {
                              if ($('#schlprovidedwithbroadbandinternetfacility').val()=='1') {
                                       // option1
                                       $("#internetfacilityhasprovidedyes").val(<?php echo $intrntfac_prvdby; ?>);
                              }
                              else{ 
                                       $('#internetfacilityhasprovidedyes').val(function () {
                                       return $(this).find('option').filter(function () {
                                       return $(this).prop('defaultSelected');
                                             }).val();
                                       });
                                            
                              } 
                            
                            });

          
                  </script>

        <!-- option2 ending -->
            <?php } ?>


            <!-- option3 -->
            <?php 
                     if ($incineratoravailingilrstoilsselect=="1") {
                ?>
                  <script type="text/javascript">
                        $('#installationiselectricalormanualrow').show();
                        $("#incineratoravailingilrstoilsselect").change(function() {
                              if ($('#incineratoravailingilrstoilsselect').val()=='1') {
                                       // option1
                                       $("#installationiselectricalormanual").val(<?php echo $instltin_electormanl; ?>);
                              }
                              else{ 
                                       $('#installationiselectricalormanual').val(function () {
                                       return $(this).find('option').filter(function () {
                                       return $(this).prop('defaultSelected');
                                             }).val();
                                       });
                                            
                              } 
                            
                            });

          
                  </script>

        <!-- option3 ending -->
            <?php } ?>


            <!-- option4 -->
            <?php 
                     if ($rampsavailinallusablebuildingselect=="2") {
                ?>
                  <script type="text/javascript">
                        $('#numberoframpsrequiredrow').show();
                        $("#rampsavailinallusablebuildingselect").change(function() {
                              if ($('#rampsavailinallusablebuildingselect').val()=='2') {
                                       // option1
                                       $("#nooframpsrequired").val(<?php echo $nooframps_req; ?>);
                              }
                              else{ 
                                       $('#nooframpsrequired').val(function () {
                                       return $(this).find('option').filter(function () {
                                       return $(this).prop('defaultSelected');
                                             }).val();
                                       });
                                            
                              } 
                            
                            });

          
                  </script>

        <!-- option4 ending -->
            <?php } ?>




    </body>

</html>