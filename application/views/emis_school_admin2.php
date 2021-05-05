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
<?php $this->load->view('block/header.php'); }else if($this->session->userdata('emis_user_type_id') == 5){ ?>
<?php $this->load->view('state/header.php'); }else{ $this->load->view('header.php'); } ?>
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
                                                <a href="<?php echo base_url().'Admin/emis_school_admin1';?>"><div class="col-md-2 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">1</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Admin</div>
                                                    <div class="mt-step-content font-grey-cascade">Information</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Admin/emis_school_admin2';?>"><div class="col-md-2 bg-grey mt-step-col  active">
                                                    <div class="mt-step-number bg-white font-grey">2</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Admin</div>
                                                    <div class="mt-step-content font-grey-cascade">Information</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Admin/emis_school_admin3';?>"><div class="col-md-2 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">3</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Admin</div>
                                                    <div class="mt-step-content font-grey-cascade">Information</div>
                                                </div></a>

                                                <a href="<?php echo base_url().'Admin/emis_school_admin5';?>"><div class="col-md-2 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">4</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Admin</div>
                                                    <div class="mt-step-content font-grey-cascade">Information</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Admin/emis_school_admin6';?>"><div class="col-md-2 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">5</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Admin</div>
                                                    <div class="mt-step-content font-grey-cascade">Information</div>
                                                </div></a>
                                                

                                                <?php if($is_high_class==1){ ?>
                                                

                                                 <a href="<?php echo base_url().'Admin/emis_school_admin4';?>"><div class="col-md-2 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">6</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Admin</div>
                                                    <div class="mt-step-content font-grey-cascade">Information</div>
                                                </div></a>
                                                
                                                <?php  }?>
                                            </div>
 
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
                                                                    <td style="width:15%"> Is this a Special School for CWSN: </td>
                                                                    <td style="width:50%">
                                                                        <a href="javascript:;" id="specialschool" data-type="select2" data-pk="1" data-value="<?php echo $current_spl_school; ?>" data-url="<?php echo base_url().'Admin/updatespecialschool';?>" data-original-title="Select "> </a>
                                                                    </td>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:15%"> Is this School Residential/Boarding School: </td>
                                                                    <td style="width:50%">
                                                                        <a href="javascript:;" id="schoolresidential" data-type="select2" data-pk="1" data-value="<?php echo $current_boarding; ?>" data-url="<?php echo base_url().'Admin/updateboardingschool';?>" data-original-title="Select "> </a>
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
                                                    <span class="caption-subject font-dark sbold uppercase">Administrative Information step 2</span>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table id="user" class="table table-bordered table-striped">
                                                            <thead>
                                                               <tr>
                                                                        <th>Phone/Mobile No.STD Code</th>
                                                                        <th>Landline No</th>
                                                                        <th colspan="3">Mobile No</th>
                                                               </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                   <td>Respondent</td>
                                                                    <td colspan="1">
                                                                       
                                                                            <a href="javascript:;" id="emis_school_admin_respondentlandlinestd" data-type="text" data-pk="1" data-url="<?php echo base_url().'Udise_admin/updateemis_school_admin_respondentlandlinestd';?>"  data-original-title="Enter the landline std code" data-value="<?php echo '0'.$rsp_lndlne_std; ?>"></a>
                                                                            -
                                                                            <a href="javascript:;" id="emis_school_admin_respondentlandlineno" data-type="text" data-pk="1" data-url="<?php echo base_url().'Udise_admin/updateemis_school_admin_respondentlandlineno';?>"  data-original-title="Enter the landline Number" data-value="<?php echo $rsp_lndlne_no; ?>"></a>
                                                                       
                                                                        
                                                                    </td>
                                                                    <td colspan="2">
                                                                        <a href="javascript:;" id="emis_school_admin_respondentmobileno" data-type="text" data-pk="1" data-url="<?php echo base_url().'Udise_admin/updateemis_school_admin_respondentmobileno';?>"  data-original-title="Enter the Mobile Number" data-value="<?php echo $rsp_mbl_no; ?>"></a>

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                     <td colspan="1">Year of establishment of the school</td>
                                                                        <td colspan="3">
                                                                            <a href="javascript:;" id="emis_school_admin_yearofestablishmentschool" data-type="text" data-pk="1" data-url="<?php echo base_url().'Udise_admin/updateemis_school_admin_yearofestablishmentschool';?>"  data-original-title="Enter the year" data-value="<?php echo $yr_estd_schl; ?>"></a>
                                                                        </td>
                                                                </tr>
                                                                <tr>
                                                                     <td colspan="1">When does the academic session start? Select the month</td>
                                                                        <td colspan="3">
                                                                            <a href="javascript:;" id="emis_school_admin_whenacademicsessionstart" data-type="select2" data-pk="1" data-url="<?php echo base_url().'Udise_admin/updateemis_school_admin_whenacademicsessionstart';?>"  data-original-title="Select the month" data-value="<?php echo $acd_sess_mnth; ?>"></a>
                                                                        </td>
                                                                </tr>
                                                                <tr>
                                                                    <td rowspan="2">Year of Recognition of the school</td>
                                                                    <td><b>Elementry</b></td>
                                                                    <td><b>Secondary</b></td>
                                                                    <td><b>Higher Secondary</b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="col-md-3">
                                                                           <a href="javascript:;" id="emis_school_admin_yrofrecofschlelem" data-type="text" data-pk="1" data-url="<?php echo base_url().'Udise_admin/updateyrofrecofschlelem';?>"  data-original-title="Enter the Elementary year" data-value="<?php echo $yr_rec_schl_elem; ?>"></a>
                                                                    </td>
                                                                    <td class="col-md-3">
                                                                         <a href="javascript:;" id="emis_school_admin_yrofrecofschlsec" data-type="text" data-pk="1" data-url="<?php echo base_url().'Udise_admin/updateyrofrecofschlsec';?>"  data-original-title="Enter the Secondary year" data-value="<?php echo $yr_rec_schl_sec; ?>">  </a>
                                                                    </td>
                                                                    <td class="col-md-3">
                                                                        <span></span>
                                                                         <a href="javascript:;" id="emis_school_admin_yrofrecofschlhsc" data-type="text" data-pk="1" data-url="<?php echo base_url().'Udise_admin/updateyrofrecofschlhsc';?>"  data-original-title="Enter the Hr.Secondary year" data-value="<?php echo $yr_rec_schl_hsc; ?>">  </a>   
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td rowspan="2">Year of upgradation of the school (if applicable)</td>
                                                                    <td><b>Primary to Upper Primary</b></td>
                                                                    <td><b>Upper Primary to Secondary</b></td>
                                                                    <td><b>Secondary to Higher Secondary</b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <a href="javascript:;" id="emis_school_admin_yrofupgrdprimtouppri" data-type="text" data-pk="1" data-url="<?php echo base_url().'Udise_admin/updateyrofupgrdprimtouppri';?>"  data-original-title="Enter the year From primary to upper primary year" data-value="<?php echo $yr_upgrd_schl_pri_uppr;?>">  </a>
                                                                    </td>
                                                                    <td>
                                                                        
                                                                        <a href="javascript:;" id="emis_school_admin_yrofupgrduppritosec" data-type="text" data-pk="1" data-url="<?php echo base_url().'Udise_admin/updateyrofupgrduppritosec';?>"  data-original-title="Enter the year From upper primary to secondary year" data-value="<?php echo $yr_upgrd_schl_upr_sec;?>"></a>
                                                                    </td>
                                                                    <td>
                                                                        
                                                                        <a href="javascript:;" id="emis_school_admin_yrofupgrdsectohsc" data-type="text" data-pk="1" data-url="<?php echo base_url().'Udise_admin/updateyrofupgrdsectohsc';?>"  data-original-title="Enter the year From secondary to higher secondary year" data-value="<?php echo $yr_upgrd_schl_sec_hsc;?>"></a>
                                                                    </td>

                                                                </tr>

                                                                <tr>
                                                                    <td>Is this a shift school:</td>
                                                                    <td colspan="3">
                                                                        <a href="javascript:;" id="emis_school_admin_isthisashiftschool" data-type="select2" data-pk="1" data-url="<?php echo base_url().'Udise_admin/updateisthisashiftschool';?>"  data-original-title="Select the option" data-value="<?php echo $shftd_schl; ?>"></a>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Are the pupils at the primary stage taught throught their mother tongue:</td>
                                                                    <td colspan="3">
                                                                        <a href="javascript:;" id="emis_school_admin_puplatpristgtaugmthrtngue" data-type="select2" data-pk="1" data-url="<?php echo base_url().'Udise_admin/updatepuplatpristgtaugmthrtngue';?>"  data-original-title="Select the option" data-value="<?php echo $pri_stg_mothr_tngue; ?>" ></a>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Does the school offers an pre-vocational course(s) at secondary stage:</td>
                                                                    <td colspan="3">
                                                                        <a href="javascript:;" id="emis_school_admin_schlofrprevoccour" data-type="select2" data-pk="1" data-url="<?php echo base_url().'Udise_admin/updateschlofrprevoccour';?>"  data-original-title="Select the option" data-value="<?php echo $schl_ofr_prevoc_cours; ?>"></a>
                                                                    </td>
                                                                </tr>


                                                                <tr>
                                                                    <td>Does the school provide educational and vocational guidance and counseling to students:</td>
                                                                    <td colspan="3">
                                                                        <a href="javascript:;" id="emis_school_admin_schlprvdeducndvocguidcounsl" data-type="select2" data-pk="1" data-url="<?php echo base_url().'Udise_admin/updateschlprvdeducndvocguidcounsl';?>"  data-original-title="Select the option" data-value="<?php echo $schl_prvd_edu_voc_gud; ?>"></a>
                                                                    </td>
                                                                </tr>


                                                                <tr>
                                                                    <td colspan="4"><b>Distance<sup>1</sup> of the school (in km.) from the nearest govt./govt. aided</b></td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Primary school/section:</td>
                                                                    <td colspan="3">
                                                                        <a href="javascript:;" id="emis_school_admin_distnceoftheprischl" data-type="text" data-pk="1" data-url="<?php echo base_url().'Udise_admin/updatedistnceoftheprischl';?>"  data-original-title="Enter the Distance" data-value="<?php echo $pri_schl; ?>"></a>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Upper primary school/section:</td>
                                                                    <td colspan="3">
                                                                        <a href="javascript:;" id="emis_school_admin_distnceoftheupprprischl" data-type="text" data-pk="1" data-url="<?php echo base_url().'Udise_admin/updatedistnceoftheupprprischl';?>"  data-original-title="Enter the distance" data-value="<?php echo $uppri_schl; ?>"></a>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Secondary school/section:</td>
                                                                    <td colspan="3">
                                                                        <a href="javascript:;" id="emis_school_admin_distnceofthesecschl" data-type="text" data-pk="1" data-url="<?php echo base_url().'Udise_admin/updatedistnceofthesecschl';?>"  data-original-title="Enter the distance" data-value="<?php echo $sec_schl; ?>"></a>
                                                                    </td>
                                                                </tr>


                                                                <tr>
                                                                    <td>Higher secondary school/junior college:</td>
                                                                    <td colspan="3">
                                                                        <a href="javascript:;" id="emis_school_admin_distnceofthehscjnrclg" data-type="text" data-pk="1" data-url="<?php echo base_url().'Udise_admin/updatedistnceofthehscjnrclg';?>"  data-original-title="Enter the distance" data-value="<?php echo $hsc_schl; ?>"></a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Whether school is approachable by all-weather roads</td>
                                                                    <td colspan="3">
                                                                         <a href="javascript:;" id="emis_school_admin_whtrschlapprchalwthrs" data-type="select2" data-pk="1" data-url="<?php echo base_url().'Udise_admin/updatewhtrschlapprchalwthrs';?>"  data-original-title="Select the option" data-value="<?php echo $schl_aprch_alwther; ?>"></a>
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
        var demodata = [];
        $.each({
            "1": "Yes",
            "0": "No",
        }, function(k, v) {
            demodata.push({
                id: k,
                text: v
            });
        });

        var admin2 = [];
        $.each({
            "1": "Yes",
            "2": "No",
        }, function(k, v) {
            admin2.push({
                id: k,
                text: v
            });
        });


        var months = [];
        $.each({
            "1": "January",
            "2": "February",
            "3": "March",
            "4": "April",
            "5": "May",
            "6": "June",
            "7": "July",
            "8": "August",
            "9": "September",
            "10": "October",
            "11": "November",
            "12": "December"
        }, function(k, v) {
            months.push({
                id: k,
                text: v
            });
        });

        $('#specialschool').editable({
            inputclass: 'form-control input-medium',
            source: demodata,
            success: function(response, newValue) {
            var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                    else 
                     toastr.success("Status updated sucessfully", "Update Notifications");
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(value != "0" && value != "1")
                {
                     return 'Required Field';

                }
            }
        });
         $('#schoolresidential').editable({
            inputclass: 'form-control input-medium',
            source: demodata,
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else 
                     toastr.success("Status updated sucessfully", "Update Notifications");
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(value != "0" && value != "1")
                {
                     return 'Required Field';

                }
            }
        }); 



          $('#emis_school_admin_respondentlandlinestd').editable({
                   type: 'text',
                   // pk: 1,
                   // name: 'emis_school_admin_respondentlandlinestd',
                   // title: 'Enter the std code',
                   success: function(response, newValue) {
                   //alert("hello");
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Std Number updated sucessfully", "Update Notifications");
               
               
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
               
                    },
                   validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only ';
                       }
                       else if(! /^\d{3,5}$/.test(value)){
                           if((value).length<1){
                              return 'Required Field';
                           }
                           else if(value){
                                if ((value).length>5) {
                                    return 'Please enter no more than 5 characters';        
                                }else if((value).length<3){
                                    return 'Please enter no less than 3 characters';
                                }
                            
                         }
                           // return 'Please enter no more than 10 characters';
                       }
                       
                   }
               });


          $('#emis_school_admin_respondentlandlineno').editable({
                   type: 'text',
                   // pk: 1,
                   // name: 'emis_school_admin_respondentlandlineno',
                   // title: 'Enter the landline Number',
                   success: function(response, newValue) {
                   //alert("hello");
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Landline Number  updated sucessfully", "Update Notifications");
               
               
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
               
                    },
                   validate: function(value){
                        if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only ';
                       }
                       else if(! /^\d{6,8}$/.test(value)){
                           if((value).length<1){
                              return 'Required Field';
                           }
                           else if(value){
                                if ((value).length>8) {
                                    return 'Please enter no more than 8 characters';        
                                }else if((value).length<6){
                                    return 'Please enter no less than 6 characters';
                                }
                            
                         }
                           // return 'Please enter no more than 10 characters';
                       }

                   }
               });

                $('#emis_school_admin_respondentmobileno').editable({
                   type: 'text',
                   // pk: 1,
                   // name: 'emis_school_admin_respondentmobileno',
                   // title: 'Enter the mobileNo',
                   success: function(response, newValue) {
                   //alert("hello");
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Mobile Number updated sucessfully", "Update Notifications");
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
               
                    },
                   validate: function(value){

                        if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only ';
                       }
                       else if(! /^\d{10}$/.test(value)){
                           if((value).length<1){
                              return 'Required Field';
                           }
                           else if(value){
                                if ((value).length>10) {
                                    return 'Please enter no more than 10 characters';        
                                }else if((value).length<10){
                                    return 'Please enter no less than 10 characters';
                                }
                            
                         }
                           // return 'Please enter no more than 10 characters';
                       }

                    
                   }
               });


                $('#emis_school_admin_whenacademicsessionstart').editable({
                   inputclass: 'form-control input-medium',
                  source: months,
                    success: function(response, newValue) {
                    var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                    else 
                     toastr.success("academic session start updated sucessfully", "Update Notifications");
                    },
                    error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
                    },
                    validate: function(value){
                    if(value != "1" && value != "2" && value != "3" && value != "4" && value != "5" && value != "6" && value != "7" && value != "8" && value != "9" && value != "10" && value != "11" && value != "12")
                        {
                     return 'Required Field';

                        }
                    }
                });


                $('#emis_school_admin_yearofestablishmentschool').editable({
                   type: 'text',
                   // pk: 1,
                   // name: 'emis_school_admin_yearofestablishmentschool',
                   // title: 'Enter the year',
                   success: function(response, newValue) {
                   //alert("hello");
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Year of establishment of the school Updated sucessfully", "Update Notifications");
               
               
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
               
                    },
                   validate: function(value){

                         if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only ';
                       }
                       else if(! /^\d{4}$/.test(value)){
                           if((value).length<1){
                              return 'Required Field';
                           }
                           else if(value){
                                if ((value).length>4) {
                                    return 'Please enter no more than 4 characters';        
                                }else if((value).length<4){
                                    return 'Please enter no less than 4 characters';
                                }
                            
                         }
                           // return 'Please enter no more than 10 characters';
                       }
                       
                   }
               });


                $('#emis_school_admin_yrofrecofschlelem').editable({
                   type: 'text',
                   // pk: 1,
                   // name: 'emis_school_admin_yearofrecognitionofschoolelementry',
                   // title: 'Enter the Year',
                   success: function(response, newValue) {
                   //alert("hello");
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Elementry year updated sucessfully", "Update Notifications");
               
               
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
               
                    },
                   validate: function(value){
                        if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only ';
                       }
                       else if(! /^\d{4}$/.test(value)){
                           if((value).length<1){
                              return 'Required Field';
                           }
                           else if(value){
                                if ((value).length>4) {
                                    return 'Please enter no more than 4 characters';        
                                }else if((value).length<4){
                                    return 'Please enter no less than 4 characters';
                                }
                            
                         }
                           // return 'Please enter no more than 10 characters';
                       }
                   }
               });


                $('#emis_school_admin_yrofrecofschlsec').editable({
                   type: 'text',
                   // pk: 1,
                   // name: 'emis_school_admin_yearofrecognitionofschoolsecondary',
                   // title: 'Enter the Year',
                   success: function(response, newValue) {
                   //alert("hello");
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Secondary year updated sucessfully", "Update Notifications");
               
               
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
               
                    },
                   validate: function(value){
                        if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only ';
                       }
                       else if(! /^\d{4}$/.test(value)){
                           if((value).length<1){
                              return 'Required Field';
                           }
                           else if(value){
                                if ((value).length>4) {
                                    return 'Please enter no more than 4 characters';        
                                }else if((value).length<4){
                                    return 'Please enter no less than 4 characters';
                                }
                            
                         }
                           // return 'Please enter no more than 10 characters';
                       }
                   }
               });


                $('#emis_school_admin_yrofrecofschlhsc').editable({
                   type: 'text',
                   // pk: 1,
                   // name: 'emis_school_admin_yearofrecognitionofschoolhrsecondary',
                   // title: 'Enter the Year',
                   success: function(response, newValue) {
                   //alert("hello");
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Higher secondary year updated sucessfully", "Update Notifications");
               
               
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
               
                    },
                   validate: function(value){
                        if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only ';
                       }
                       else if(! /^\d{4}$/.test(value)){
                           if((value).length<1){
                              return 'Required Field';
                           }
                           else if(value){
                                if ((value).length>4) {
                                    return 'Please enter no more than 4 characters';        
                                }else if((value).length<4){
                                    return 'Please enter no less than 4 characters';
                                }
                            
                         }
                           // return 'Please enter no more than 10 characters';
                       }
                   }
               });



                $('#emis_school_admin_yrofupgrdprimtouppri').editable({
                   type: 'text',
                   // pk: 1,
                   // name: 'emis_school_admin_yearofupgradationschoolprimarytoupperprimary',
                   // title: 'Enter the Year',
                   success: function(response, newValue) {
                   //alert("hello");
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Primary to Upper primary year updated sucessfully", "Update Notifications");
               
               
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
               
                    },
                   validate: function(value){
                        if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only ';
                       }
                       else if(! /^\d{4}$/.test(value)){
                           if((value).length<1){
                              return 'Required Field';
                           }
                           else if(value){
                                if ((value).length>4) {
                                    return 'Please enter no more than 4 characters';        
                                }else if((value).length<4){
                                    return 'Please enter no less than 4 characters';
                                }
                            
                         }
                           // return 'Please enter no more than 10 characters';
                       }
                   }
               });



                $('#emis_school_admin_yrofupgrduppritosec').editable({
                   type: 'text',
                   // pk: 1,
                   // name: 'emis_school_admin_yearofupgradationschoolupperprimarytosecondary',
                   // title: 'Enter the Year',
                   success: function(response, newValue) {
                   //alert("hello");
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Upper primary to secondary year updated sucessfully", "Update Notifications");
               
               
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
               
                    },
                   validate: function(value){
                        if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only ';
                       }
                       else if(! /^\d{4}$/.test(value)){
                           if((value).length<1){
                              return 'Required Field';
                           }
                           else if(value){
                                if ((value).length>4) {
                                    return 'Please enter no more than 4 characters';        
                                }else if((value).length<4){
                                    return 'Please enter no less than 4 characters';
                                }
                            
                         }
                           // return 'Please enter no more than 10 characters';
                       }
                   }
               });



                $('#emis_school_admin_yrofupgrdsectohsc').editable({
                   type: 'text',
                   // pk: 1,
                   // name: 'emis_school_admin_yearofupgradationschoolsecondarytohighersecondary',
                   // title: 'Enter the Year',
                   success: function(response, newValue) {
                   //alert("hello");
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Secondary to higher secondary year updated sucessfully", "Update Notifications");
               
               
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
               
                    },
                   validate: function(value){
                        if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only ';
                       }
                       else if(! /^\d{4}$/.test(value)){
                           if((value).length<1){
                              return 'Required Field';
                           }
                           else if(value){
                                if ((value).length>4) {
                                    return 'Please enter no more than 4 characters';        
                                }else if((value).length<4){
                                    return 'Please enter no less than 4 characters';
                                }
                            
                         }
                           // return 'Please enter no more than 10 characters';
                       }
                   }
               });


             
                 $('#emis_school_admin_isthisashiftschool').editable({
            inputclass: 'form-control input-medium',
            source: admin2,
            success: function(response, newValue) {
            var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                    else 
                     toastr.success("Is this a shift school updated sucessfully", "Update Notifications");
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

                $('#emis_school_admin_puplatpristgtaugmthrtngue').editable({
            inputclass: 'form-control input-medium',
            source: admin2,
            success: function(response, newValue) {
            var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                    else 
                     toastr.success("Are the pupils at the primary stage taught throught their mother tongue Updated sucessfully", "Update Notifications");
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


            $('#emis_school_admin_schlofrprevoccour').editable({
            inputclass: 'form-control input-medium',
            source: admin2,
            success: function(response, newValue) {
            var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                    else 
                     toastr.success("Does the school offers an pre-vocational course(s) at secondary stage Updated Sucessfully", "Update Notifications");
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
              

        // ***** Does the school provide educational and vocational guidance and counseling to students *****
               $('#emis_school_admin_schlprvdeducndvocguidcounsl').editable({
            inputclass: 'form-control input-medium',
            source: admin2,
            success: function(response, newValue) {
            var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                    else 
                     toastr.success("Does the school provide educational and vocational guidance and counseling to students updated sucessfully", "Update Notifications");
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



        
                


         $('#emis_school_admin_distnceoftheprischl').editable({
                   type: 'text',
                   // pk: 1,
                   // name: 'emis_school_admin_distanceoftheprimaryschool',
                   // title: 'Enter the distance',
                   success: function(response, newValue) {
                   //alert("hello");
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Distance Primary school/section updated sucessfully", "Update Notifications");
               
               
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
               
                    },
                   validate: function(value){
                        if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only ';
                       }
                       else if(! /^\d{1,3}$/.test(value)){
                           if((value).length<1){
                              return 'Required Field';
                           }
                           else if((value).length>4){
                                    return 'Please enter no more than 4 characters';        
                         }
                           // return 'Please enter no more than 10 characters';
                       }
                   }
               });

         $('#emis_school_admin_distnceoftheupprprischl').editable({
                   type: 'text',
                   // pk: 1,
                   // name: 'emis_school_admin_distanceoftheupperprimaryschool',
                   // title: 'Enter the distance',
                   success: function(response, newValue) {
                   //alert("hello");
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Distance Upper primary school/section updated sucessfully", "Update Notifications");
               
               
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
               
                    },
                   validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only ';
                       }
                       else if(! /^\d{1,3}$/.test(value)){
                           if((value).length<1){
                              return 'Required Field';
                           }
                           else if((value).length>4){
                                    return 'Please enter no more than 4 characters';        
                         }
                           // return 'Please enter no more than 10 characters';
                       }
                   }
               });

         $('#emis_school_admin_distnceofthesecschl').editable({
                   type: 'text',
                   success: function(response, newValue) {
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Secondary school/section Distance updated sucessfully", "Update Notifications");
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
               
                    },
                   validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only ';
                       }
                       else if(! /^\d{1,3}$/.test(value)){
                           if((value).length<1){
                              return 'Required Field';
                           }
                           else if((value).length>4){
                                    return 'Please enter no more than 4 characters';        
                         }
                           // return 'Please enter no more than 10 characters';
                       }
                   }
               });

         $('#emis_school_admin_distnceofthehscjnrclg').editable({
                   type: 'text',
                   success: function(response, newValue) {
                            var result = $.parseJSON(response);
                            if(result.response_code != 1) return result.error_msg; 
                            else
                               toastr.success("Higher Secondary School/Junior college Distance updated sucessfully", "Update Notifications");
                   },
                   error: function(response, newValue) {
                            return 'Service unavailable. Please try later.';
               
                    },
                   validate: function(value){
                       if(/[^0-9]/.test(value))
                       {
                           return 'Enter Number only ';
                       }
                       else if(! /^\d{1,3}$/.test(value)){
                           if((value).length<1){
                              return 'Required Field';
                           }
                           else if((value).length>4){
                                    return 'Please enter no more than 4 characters';        
                         }
                           // return 'Please enter no more than 10 characters';
                       }
                   }
               });



              $('#emis_school_admin_whtrschlapprchalwthrs').editable({
            inputclass: 'form-control input-medium',
            source: admin2,
            success: function(response, newValue) {
            var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                    else 
                     toastr.success("Whether school is approachable by all-weather roads Updated sucessfully", "Update Notifications");
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




            // init editable toggler
             $('#user .editable').editable('toggleDisabled');
            $('#enable').click(function() {
                $('#user .editable').editable('toggleDisabled');
            });







            

</script>

    </body>

</html>