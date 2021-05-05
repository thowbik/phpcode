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
                                                <a href="<?php echo base_url().'Design/emis_school_sdvariable1';?>"><div class="col-md-4 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">1</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">State Defined</div>
                                                    <div class="mt-step-content font-grey-cascade">Variables</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Design/emis_school_sdvariable2';?>"><div class="col-md-4 bg-grey mt-step-col active">
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
                                                    <span class="caption-subject font-dark sbold uppercase">Staff Defined variables step 2</span> - <small>Parameters applicable for Government/Pvt. Aided/ Pvt.Unaided Schools</small>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table id="user" class="table table-bordered table-striped">
                                                            <tbody>
                                                                <tr>
                                                                     <td colspan="2"><b>No. of Laptops in working condition supplied under (for classes I-VIII)</b></td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="col-md-6">SSA</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_laptopsworkngsupliedforssa" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_laptopsworkngsupliedforssa"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                        <td>DSE</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_laptopsworkngsupliedfordse" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_laptopsworkngsupliedfordse"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                        <td>DEE</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_laptopsworkngsupliedfordee" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_laptopsworkngsupliedfordee"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                        <td>RMSA</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_laptopsworkngsupliedforrmsa" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_laptopsworkngsupliedforrmsa"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                        <td>Others</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_laptopsworkngsupliedforothers" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_laptopsworkngsupliedforothers"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                        <td>No of LCD Projectors available</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_nooflcdprojectorsavail" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_nooflcdprojectorsavail"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                        <td>No of LCD Projectors in working condition</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_nooflcdprojectorsinworkingcondtion" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_nooflcdprojectorsinworkingcondtion"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                     <td colspan="2"><b>No. of LCD projectors Supplied by</b></td>
                                                                </tr>
                                                                <tr>
                                                                        <td class="col-md-6">SSA</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_lcdprojectorssupliedforssa" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_lcdprojectorssupliedforssa"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                        <td>DSE</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_lcdprojectorssupliedfordse" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_lcdprojectorssupliedfordse"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                        <td>DEE</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_lcdprojectorssupliedfordee" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_lcdprojectorssupliedfordee"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                        <td>RMSA</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_lcdprojectorssupliedforrmsa" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_lcdprojectorssupliedforrmsa"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                        <td>Others</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_lcdprojectorssupliedforothers" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_lcdprojectorssupliedforothers"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                        <td>Whether Azim Premji Foundation (APF) CDs has been installed in Desktops and laptops</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_apfcdinstalledindesktopandlaptop" data-type="select2" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_apfcdinstalledindesktopandlaptop"  data-original-title="Select the option"></a>
                                                                        </td>
                                                                </tr>


                                                                <tr>
                                                                        <td colspan="2"><b>Number of Ramps provided under</b></td>
                                                                        
                                                                </tr>
                                                                <tr>
                                                                        <td>SSA</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_nooframpsprovidedunderssa" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_nooframpsprovidedunderssa"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>
                                                                <tr>
                                                                        <td>PWD</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_nooframpsprovidedunderpwd" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_nooframpsprovidedunderpwd"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>
                                                                <tr>
                                                                        <td>Others</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_nooframpsprovidedunderothers" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_nooframpsprovidedunderothers"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                        <td>No. of Benches and Desks available (for Classes VI-VIII)</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_noofbenchanddeskavail" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_noofbenchanddeskavail"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                        <td>No. of Benches and Desks required (Based on enrolment for Classes VI-VIII)</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_noofbenchanddeskrequired" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_noofbenchanddeskrequired"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>


                                                                <tr>
                                                                        <td>SMC Contribution (In Rs.)</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_smccontribution" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_smccontribution"  data-original-title="Enter the count"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                        <td>Whether the school is provided with fire extinguisher</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_schlprovidedwithfireextinguisher" data-type="select2" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_schlprovidedwithfireextinguisher"  data-original-title="Select the option"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                        <td>Whether the school has been provided with water purifier/RO system</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_schlprovidedwithwaterpurifierorrosys" data-type="select2" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_schlprovidedwithwaterpurifierorrosys"  data-original-title="Select the option"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                        <td>If Compound wall required, mention the required length in meters</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_compoundwallrequiredlength" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_compoundwallrequiredlength"  data-original-title="Enter the Requied length in meters"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                        <td>Whether the school report card for the year 2016-17 has been displayed on the Notice board?</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_schlreportcardfor2016_17" data-type="select2" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_schlreportcardfor2016_17"  data-original-title="Select the option"></a>
                                                                        </td>
                                                                </tr>


                                                                <tr>
                                                                        <td>Whether the UDISE data for the year 2016-17 has been shared with community(SMC) members?</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_udisedataforyear2016_17sharedwithsmc" data-type="select2" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_udisedataforyear2016_17sharedwithsmc"  data-original-title="Select the option"></a>
                                                                        </td>
                                                                </tr>



                                                                <tr>
                                                                        <td>SMDC contribution (in Rs.)</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_smdccontribution" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_smdccontribution"  data-original-title="Enter the SMDC contribution in Rs"></a>
                                                                        </td>
                                                                </tr>

                                                                <tr>
                                                                        <td>No. of Academic inspection made by CEO/DEO(RMSA Officials) for sec.school</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_academicinspection" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_academicinspection"  data-original-title="Enter the Count"></a>
                                                                        </td>
                                                                </tr>


                                                                <tr>
                                                                        <td>No. of visits made by ADPC/EDC (RMSA officials) for secondary school</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_adpcoredcforsecondaryschl" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_adpcoredcforsecondaryschl"  data-original-title="Enter the Count"></a>
                                                                        </td>
                                                                </tr>


                                                                <tr>
                                                                        <td>No. of Toilets in Dilapidated Condtion</td>
                                                                        <td>
                                                                            <a href="javascript:;" id="emis_school_sdvariables_nooftoiletsindilapidatedcondtion" data-type="text" data-pk="0" data-url="http://localhost/tnschools/Design/updateemis_school_sdvariables_nooftoiletsindilapidatedcondtion"  data-original-title="Enter the Count"></a>
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
        $('#emis_school_sdvariables_laptopsworkngsupliedforssa').editable({
            type: 'text',
            pk: 1,
            name: 'laptopsworkngsupliedforssa',
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
            
        
        $('#emis_school_sdvariables_laptopsworkngsupliedfordse').editable({
            type: 'text',
            pk: 1,
            name: 'laptopsworkngsupliedfordse',
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


        $('#emis_school_sdvariables_laptopsworkngsupliedfordee').editable({
            type: 'text',
            pk: 1,
            name: 'laptopsworkngsupliedfordee',
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


        $('#emis_school_sdvariables_laptopsworkngsupliedforrmsa').editable({
            type: 'text',
            pk: 1,
            name: 'laptopsworkngsupliedforrmsa',
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


        $('#emis_school_sdvariables_laptopsworkngsupliedforothers').editable({
            type: 'text',
            pk: 1,
            name: 'laptopsworkngsupliedforrmsa',
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

       
        $('#emis_school_sdvariables_nooflcdprojectorsavail').editable({
            type: 'text',
            pk: 1,
            name: 'nooflcdprojectorsavail',
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

        $('#emis_school_sdvariables_nooflcdprojectorsinworkingcondtion').editable({
            type: 'text',
            pk: 1,
            name: 'nooflcdprojectorsinworkingcondtion',
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



        $('#emis_school_sdvariables_lcdprojectorssupliedforssa').editable({
            type: 'text',
            pk: 1,
            name: 'lcdprojectorssupliedforssa',
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
            
        
        $('#emis_school_sdvariables_lcdprojectorssupliedfordse').editable({
            type: 'text',
            pk: 1,
            name: 'lcdprojectorssupliedfordse',
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


        $('#emis_school_sdvariables_lcdprojectorssupliedfordee').editable({
            type: 'text',
            pk: 1,
            name: 'lcdprojectorssupliedfordee',
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


        $('#emis_school_sdvariables_lcdprojectorssupliedforrmsa').editable({
            type: 'text',
            pk: 1,
            name: 'lcdprojectorssupliedforrmsa',
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


        $('#emis_school_sdvariables_lcdprojectorssupliedforothers').editable({
            type: 'text',
            pk: 1,
            name: 'lcdprojectorssupliedforrmsa',
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

        

        $('#emis_school_sdvariables_apfcdinstalledindesktopandlaptop').editable({
            inputclass: 'form-control input-medium',
            source: sdvariablesyesorno,
            success: function(response, newValue) {
            var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                    else 
                     toastr.success("APF Data updated sucessfully", "Update Notifications");
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


        $('#emis_school_sdvariables_nooframpsprovidedunderssa').editable({
            type: 'text',
            pk: 1,
            name: 'nooframpsprovidedunderssa',
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


        $('#emis_school_sdvariables_nooframpsprovidedunderpwd').editable({
            type: 'text',
            pk: 1,
            name: 'nooframpsprovidedunderpwd',
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


        $('#emis_school_sdvariables_nooframpsprovidedunderothers').editable({
            type: 'text',
            pk: 1,
            name: 'nooframpsprovidedunderothers',
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


        $('#emis_school_sdvariables_noofbenchanddeskavail').editable({
            type: 'text',
            pk: 1,
            name: 'noofbenchanddeskavail',
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
            

            $('#emis_school_sdvariables_noofbenchanddeskrequired').editable({
            type: 'text',
            pk: 1,
            name: 'noofbenchanddeskrequired',
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





$('#emis_school_sdvariables_schlprovidedwithfireextinguisher').editable({
            inputclass: 'form-control input-medium',
            source: sdvariablesyesorno,
            success: function(response, newValue) {
            var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                    else 
                     toastr.success("Fire Extinguisher is updated sucessfully", "Update Notifications");
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



        $('#emis_school_sdvariables_schlprovidedwithwaterpurifierorrosys').editable({
            inputclass: 'form-control input-medium',
            source: sdvariablesyesorno,
            success: function(response, newValue) {
            var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                    else 
                     toastr.success("Water purifier is updated sucessfully", "Update Notifications");
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


        $('#emis_school_sdvariables_compoundwallrequiredlength').editable({
            type: 'text',
            pk: 1,
            name: 'compoundwallrequiredlength',
            title: 'Enter the count',
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },validate: function(value){
                       if(/[^0-9,]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,15}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 15 characters';
                       }
                   }
            });



        $('#emis_school_sdvariables_schlreportcardfor2016_17').editable({
            inputclass: 'form-control input-medium',
            source: sdvariablesyesorno,
            success: function(response, newValue) {
            var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                    else 
                     toastr.success("School Report card displayed updated sucessfully", "Update Notifications");
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



        $('#emis_school_sdvariables_udisedataforyear2016_17sharedwithsmc').editable({
            inputclass: 'form-control input-medium',
            source: sdvariablesyesorno,
            success: function(response, newValue) {
            var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                    else 
                     toastr.success("UDISE data for year 2016-17 shared status updated sucessfully", "Update Notifications");
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
            


        $('#emis_school_sdvariables_smdccontribution').editable({
            type: 'text',
            pk: 1,
            name: 'smdccontribution',
            title: 'Enter the count',
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },validate: function(value){
                       if(/[^0-9,]/.test(value))
                       {
                           return 'Enter Number only';
                       }
                       else if(! /^\d{1,15}$/.test(value)){
                           if(value===''){
                              return 'Required Field';
                           }
                           return 'Please enter no more than 4 characters';
                       }
                   }
            });

        

        $('#emis_school_sdvariables_academicinspection').editable({
            type: 'text',
            pk: 1,
            name: 'academicinspection',
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




            $('#emis_school_sdvariables_adpcoredcforsecondaryschl').editable({
            type: 'text',
            pk: 1,
            name: 'adpcoredcforsecondaryschl',
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


            $('#emis_school_sdvariables_nooftoiletsindilapidatedcondtion').editable({
            type: 'text',
            pk: 1,
            name: 'nooftoiletsindilapidatedcondtion',
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