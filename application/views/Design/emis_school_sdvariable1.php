<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>

        <link href="<?php echo base_url().'asset/global/plugins/datatables/datatables.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css';?>" rel="stylesheet" type="text/css" />

        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->

        <link href="<?php echo base_url().'asset/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2.min.css';?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url().'asset/global/plugins/select2/css/select2-bootstrap.min.css';?>" rel="stylesheet" type="text/css" />




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
                                                <a href="<?php echo base_url().'Design/emis_school_sdvariable1';?>"><div class="col-md-4 bg-grey mt-step-col active">
                                                    <div class="mt-step-number bg-white font-grey">1</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">State Defined</div>
                                                    <div class="mt-step-content font-grey-cascade">Variables</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Design/emis_school_sdvariable2';?>"><div class="col-md-4 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">2</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">State Defined</div>
                                                    <div class="mt-step-content font-grey-cascade">Variables</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Design/emis_school_sdvariable3';?>"><div class="col-md-4 bg-grey mt-step-col">
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
                                                    <span class="caption-subject font-dark sbold uppercase">Staff Defined variables step 1</span> - <small>Parameters applicable for Government/Pvt. Aided/ Pvt.Unaided Schools</small>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table id="user" class="table table-bordered table-striped">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="col-md-6">TV/DVD functional</td>
                                                                    <td>
                                                                        <div> 
                                                                            <a href="javascript:;" id="emis_school_sdvariables_tvdvdfunctional" data-type="select2" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_tvdvdfunctional"  data-original-title="Select the option"></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                     <td>Maths Kit Received</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_mathskitreceived" data-type="select2" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_mathskitreceived"  data-original-title="Select the option"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                     <td>No. of teachers need Maths kit training</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_noofteachrsneedmathskit" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_noofteachrsneedmathskit"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                     <td>No. of books available in the reading corner</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_noofbooksavailinreadingcorner" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_noofbooksavailinreadingcorner"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                     <td>No. of children actually reading supplementry and graded books in the Reading corner (based on the Head Master/Teachers Observation)</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_noofchildrenreadingsupplementry" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_noofchildrenreadingsupplementry"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                     <td>Whether the school situated</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_schoolsituated" data-type="select2" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_schoolsituated"  data-original-title="Select the option"></a>
                                                                        </td>
                                                                </tr>


                                                                <tr>
                                                                     <td>Mention school email id</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_schoolemailid" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_schoolemailid"  data-original-title="Enter the school email id"></a>
                                                                        </td>
                                                                </tr>


                                                                <tr>
                                                                     <td>Name of the BRTE in-charge of the school</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_schoolbrteinchargename" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_schoolbrteinchargename"  data-original-title="Enter the school BRTE in-charge Name"></a>
                                                                        </td>
                                                                </tr>


                                                                <tr>
                                                                     <td>Reason for Toilet not functional</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_reasonfortoiletnotfunctional" data-type="select2" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_reasonfortoiletnotfunctional"  data-original-title="Select the option"></a>
                                                                        </td>
                                                                </tr>


                                                                <tr>
                                                                     <td>Is land available for construction of additional toilets if required</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_landavailforconstruction" data-type="select2" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_landavailforconstruction"  data-original-title="Select the option"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                     <td>Whether drinking water facility provided to all children in all working days</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_drinkingwaterfacprovidedtoallchildrens" data-type="select2" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_drinkingwaterfacprovidedtoallchildrens"  data-original-title="Select the option"></a>
                                                                        </td>
                                                                </tr>


                                                                <tr>
                                                                     <td>Water facility available for</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_waterfacilityavailfor" data-type="select2" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_waterfacilityavailfor"  data-original-title="Select the option"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                     <td>Whether the school is provided with Overhead tank</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_schloverldedtank" data-type="select2" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_schloverldedtank"  data-original-title="Select the option"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                     <td colspan="2"><b>No. of Desktop computers Supplied by (for classes I-VIII)</b></td>
                                                                </tr>
                                                                <tr>
                                                                        <td>SSA</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_desktopcomputersupliedforssa" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_desktopcomputersupliedforssa"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                        <td>DSE</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_desktopcomputersupliedfordse" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_desktopcomputersupliedfordse"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                        <td>DEE</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_desktopcomputersupliedfordee" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_desktopcomputersupliedfordee"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                        <td>RMSA</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_desktopcomputersupliedforrmsa" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_desktopcomputersupliedforrmsa"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                        <td>Others</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_desktopcomputersupliedforothers" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_desktopcomputersupliedforothers"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                     <td colspan="2"><b>No. of Desktop computers in working condition supplied under (for classes I-VIII)</b></td>
                                                                </tr>
                                                                <tr>
                                                                        <td>SSA</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_desktopcomputerworkngsupliedforssa" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_desktopcomputerworkngsupliedforssa"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                        <td>DSE</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_desktopcomputerworkngsupliedfordse" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_desktopcomputerworkngsupliedfordse"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                        <td>DEE</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_desktopcomputerworkngsupliedfordee" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_desktopcomputerworkngsupliedfordee"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                        <td>RMSA</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_desktopcomputerworkngsupliedforrmsa" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_desktopcomputerworkngsupliedforrmsa"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                        <td>Others</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_desktopcomputerworkngsupliedforothers" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_desktopcomputerworkngsupliedforothers"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                        <td>No of Laptops available</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_nooflaptopsavail" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_nooflaptopsavail"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>


                                                                <tr>
                                                                     <td colspan="2"><b>No. of Laptops Supplied by (for classes I-VIII)</b></td>
                                                                </tr>
                                                                <tr>
                                                                        <td>SSA</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_laptopssupliedforssa" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_laptopssupliedforssa"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                        <td>DSE</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_laptopssupliedfordse" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_laptopssupliedfordse"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                        <td>DEE</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_laptopssupliedfordee" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_laptopssupliedfordee"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                        <td>RMSA</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_laptopssupliedforrmsa" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_laptopssupliedforrmsa"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                        <td>Others</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_laptopssupliedforothers" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_laptopssupliedforothers"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <center><p>(Note: If you want to Edit Class wise No. of Sections & Students Details, please select appropriate Update link in Index Page)</p></center>
                          -->
           
                             

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

        <!-- END PAGE LEVEL SCRIPTS -->



         <script>
        var sdvariablesyesorno = [];
        $.each({
            "1": "YES",
            "2": "N0",
        }, function(k, v) {
            sdvariablesyesorno.push({
                id: k,
                text: v
            });
        });

        

        $('#emis_school_sdvariables_tvdvdfunctional').editable({
            inputclass: 'form-control input-medium',
            source: sdvariablesyesorno,
            success: function(response, newValue) {
            var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                    else 
                     toastr.success("TV/DVD functional updated sucessfully", "Update Notifications");
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(value != "1" && value != "2")
                {
                     return 'Required  Field';

                }
            }
        });
         

        $('#emis_school_sdvariables_mathskitreceived').editable({
            inputclass: 'form-control input-medium',
            source: sdvariablesyesorno,
            success: function(response, newValue) {
            var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                    else 
                     toastr.success("Maths kit received updated sucessfully", "Update Notifications");
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


        $('#emis_school_sdvariables_noofteachrsneedmathskit').editable({
            type: 'text',
            pk: 1,
            name: 'noof_mathskitneed',
            title: 'Enter the number of maths kit needed for training',
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
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


        $('#emis_school_sdvariables_noofbooksavailinreadingcorner').editable({
            type: 'text',
            pk: 1,
            name: 'noof_booksavailinreadingcorner',
            title: 'Enter the number of books available in reading corner',
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
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



        $('#emis_school_sdvariables_noofchildrenreadingsupplementry').editable({
            type: 'text',
            pk: 1,
            name: 'noofchildrenreadingsupplementry',
            title: 'Enter the number of children actually reading supplementry and graded books in the Reading corner',
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
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
        

        var schoolsitutated = [];
        $.each({
            "1": "In forest/Hill area",
            "2": "Near forest/Hill area",
            "3": "Near in the Highways",
            "4": "Near on coastal area",
            "5": "Not applicable",
        }, function(k, v) {
            schoolsitutated.push({
                id: k,
                text: v
            });
        });

        $('#emis_school_sdvariables_schoolsituated').editable({
            inputclass: 'form-control input-medium',
            source: schoolsitutated,
            success: function(response, newValue) {
            var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                    else 
                     toastr.success("school situated updated sucessfully", "Update Notifications");
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(value != "1" && value != "2" && value != "3" && value != "4" && value != "5")
                {
                     return 'Required Field';

                }
            }
        });


        $('#emis_school_sdvariables_schoolemailid').editable({
            type: 'text',
            pk: 1,
            name: 'schoolemailid',
            title: 'Mention the school email id',
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },validate: function(value){
                       if(!/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/.test(value))
                       {
                           return 'Enter Valid Email';
                       }
                       else if(!/^\d{1,50}$/.test(value)){
                             // return 'Please enter no more than 50 characters';
                           if((value).length<1){
                              return 'Required Field';
                           }
                           else if((value).length>50){
                            return 'Please enter no more than 50 characters';
                         }
                       }
                      
                   }
        });


         $('#emis_school_sdvariables_schoolbrteinchargename').editable({
            type: 'text',
            pk: 1,
            name: 'schoolbrteinchargename',
            title: 'Enter school BRTE incharge name',
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },validate: function(value){
                       if(/[^a-zA-Z]/.test(value))
                       {
                           return 'Enter Text only';
                       }
                       else if(! /^\d{1,20}$/.test(value)){
                           if((value).length<1){
                              return 'Required Field';
                           }
                           else if((value).length>20){
                            return 'Please enter no more than 20 characters';
                        }
                       }
                   }
        });



         var reasonfortoiletnotfunctional = [];
        $.each({
            "1": "water supply",
            "2": "Drinage problem",
            "3": "Toilet Damaged",
            "4": "Not applicable",
        }, function(k, v) {
            reasonfortoiletnotfunctional.push({
                id: k,
                text: v
            });
        });

        $('#emis_school_sdvariables_reasonfortoiletnotfunctional').editable({
            inputclass: 'form-control input-medium',
            source: reasonfortoiletnotfunctional,
            success: function(response, newValue) {
            var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                    else 
                     toastr.success("school situated updated sucessfully", "Update Notifications");
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(value != "1" && value != "2" && value != "3" && value != "4")
                {
                     return 'Required Field';

                }
            }
        });


        $('#emis_school_sdvariables_landavailforconstruction').editable({
            inputclass: 'form-control input-medium',
            source: sdvariablesyesorno,
            success: function(response, newValue) {
            var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                    else 
                     toastr.success("Land available for construction updated sucessfully", "Update Notifications");
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


         $('#emis_school_sdvariables_drinkingwaterfacprovidedtoallchildrens').editable({
            inputclass: 'form-control input-medium',
            source: sdvariablesyesorno,
            success: function(response, newValue) {
            var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                    else 
                     toastr.success("Drinking water facility updated sucessfully", "Update Notifications");
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


          var waterfac = [];
        $.each({
            "1": "Drinking only",
            "2": "Toilet usage only",
            "3": "for both",
            "4": "None",
        }, function(k, v) {
            waterfac.push({
                id: k,
                text: v
            });
        });


         $('#emis_school_sdvariables_waterfacilityavailfor').editable({
            inputclass: 'form-control input-medium',
            source:waterfac,
            success: function(response, newValue) {
            var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                    else 
                     toastr.success("Water facility updated sucessfully", "Update Notifications");
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(value != "1" && value != "2" && value != "3" && value != "4")
                {
                     return 'Required Field';

                }
            }
        });


         var overheadtank = [];
        $.each({
            "1": "Yes",
            "2": "No",
            "3": "Repair",
        }, function(k, v) {
            overheadtank.push({
                id: k,
                text: v
            });
        });

         $('#emis_school_sdvariables_schloverldedtank').editable({
            inputclass: 'form-control input-medium',
            source:overheadtank,
            success: function(response, newValue) {
            var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                    else 
                     toastr.success("Water facility updated sucessfully", "Update Notifications");
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(value != "1" && value != "2" && value != "3" && value != "4")
                {
                     return 'Required Field';

                }
            }
        });

        


            $('#emis_school_sdvariables_desktopcomputersupliedforssa').editable({
            type: 'text',
            pk: 1,
            name: 'desktopcomputersupliedforssa',
            title: 'Enter the count',
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
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
            
        
        $('#emis_school_sdvariables_desktopcomputersupliedfordse').editable({
            type: 'text',
            pk: 1,
            name: 'desktopcomputersupliedfordse',
            title: 'Enter the count',
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
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


        $('#emis_school_sdvariables_desktopcomputersupliedfordee').editable({
            type: 'text',
            pk: 1,
            name: 'desktopcomputersupliedfordee',
            title: 'Enter the count',
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
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


        $('#emis_school_sdvariables_desktopcomputersupliedforrmsa').editable({
            type: 'text',
            pk: 1,
            name: 'desktopcomputersupliedforrmsa',
            title: 'Enter the count',
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
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


        $('#emis_school_sdvariables_desktopcomputersupliedforothers').editable({
            type: 'text',
            pk: 1,
            name: 'desktopcomputersupliedforrmsa',
            title: 'Enter the count',
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
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


        $('#emis_school_sdvariables_desktopcomputerworkngsupliedforssa').editable({
            type: 'text',
            pk: 1,
            name: 'desktopcomputerworkngsupliedforssa',
            title: 'Enter the count',
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
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
            
        
        $('#emis_school_sdvariables_desktopcomputerworkngsupliedfordse').editable({
            type: 'text',
            pk: 1,
            name: 'desktopcomputerworkngsupliedfordse',
            title: 'Enter the count',
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
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


        $('#emis_school_sdvariables_desktopcomputerworkngsupliedfordee').editable({
            type: 'text',
            pk: 1,
            name: 'desktopcomputerworkngsupliedfordee',
            title: 'Enter the count',
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
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


        $('#emis_school_sdvariables_desktopcomputerworkngsupliedforrmsa').editable({
            type: 'text',
            pk: 1,
            name: 'desktopcomputerworkngsupliedforrmsa',
            title: 'Enter the count',
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
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


        $('#emis_school_sdvariables_desktopcomputerworkngsupliedforothers').editable({
            type: 'text',
            pk: 1,
            name: 'desktopcomputerworkngsupliedforrmsa',
            title: 'Enter the count',
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
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

        $('#emis_school_sdvariables_nooflaptopsavail').editable({
            type: 'text',
            pk: 1,
            name: 'nooflaptopsavail',
            title: 'Enter the count',
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
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




        $('#emis_school_sdvariables_laptopssupliedforssa').editable({
            type: 'text',
            pk: 1,
            name: 'laptopssupliedforssa',
            title: 'Enter the count',
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
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
            
        
        $('#emis_school_sdvariables_laptopssupliedfordse').editable({
            type: 'text',
            pk: 1,
            name: 'laptopssupliedfordse',
            title: 'Enter the count',
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
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


        $('#emis_school_sdvariables_laptopssupliedfordee').editable({
            type: 'text',
            pk: 1,
            name: 'laptopssupliedfordee',
            title: 'Enter the count',
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
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


        $('#emis_school_sdvariables_laptopssupliedforrmsa').editable({
            type: 'text',
            pk: 1,
            name: 'laptopssupliedforrmsa',
            title: 'Enter the count',
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
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


        $('#emis_school_sdvariables_laptopssupliedforothers').editable({
            type: 'text',
            pk: 1,
            name: 'laptopssupliedforrmsa',
            title: 'Enter the count',
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
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


        

            // init editable toggler
             $('#user .editable').editable('toggleDisabled');
            $('#enable').click(function() {
                $('#user .editable').editable('toggleDisabled');
            });







            

</script>

    </body>

</html>