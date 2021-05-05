<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>

        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->




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
                                                <a href="<?php echo base_url().'Admin/emis_school_admin2';?>"><div class="col-md-1 bg-grey mt-step-col">
                                                    <div class="mt-step-number bg-white font-grey">2</div>

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
                                                <a href="<?php echo base_url().'Admin/emis_school_admin7';?>"><div class="col-md-6 bg-grey mt-step-col active">
                                                 <div class="mt-step-number bg-white font-grey">7</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Administrative Information</div>
                                                    <div class="mt-step-content font-grey-cascade">Step 7</div>
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
                                                    <span class="caption-subject font-dark sbold uppercase">Administrative Information step 7</span>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        
                                                         <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i> Non-Teaching Staff  </div>
                                                        <div class="tools"> </div>
                                                       
                                                    </div>
                                                    <div class="portlet-body">
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                    <th> Sno </th>
                                                                    <th> Name of the Sanctioned Post </th>
                                                                    <th> Mode of Sanctioned </th>
                                                                    <th> Number of post Sanctioned </th>
                                                                    <th> G.O. / Continuance order No. (Incase of temporary) </th>
                                                                    <th> Date </th>
                                                                    <th> Period For Continuance Given </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td> 1 </td>
                                                                    <td> Office Assistant </td>
                                                                    <td> Temporary </td>
                                                                    <td> 1 </td>
                                                                    <td> G.O. No. 2321 SE Dept </td>
                                                                    <td> May 5, 2012 </td>
                                                                    <td> Govt. Lr. No.2342 </td>
                                                                </tr>
                                                      
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET--> 
                                                          <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                  <div class="portlet box green">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-globe"></i> Part-Time Instructors </div>
                                                        <div class="tools"> </div>
                                                       
                                                    </div>
                                                    <div class="portlet-body">
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                    <th> Sno </th>
                                                                    <th> Name </th>
                                                                    <th> Subject Handling </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td> 1 </td>
                                                                    <td> Kirubakaran </td>
                                                                    <td> Computer Science </td>
                                                                </tr>
                                                      
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET--> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <center><p>(Note: If you want to Edit Scale Register for Non-Teaching Post or Part-time Instructors Details, please select appropriate Update link in Index Page)</p></center>
                         
           
                             

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
        $('#schoolname').editable({
            type: 'text',
            pk: 1,
            name: 'schoolname',
            title: 'Enter School Name'
        });
        $('#schoolnametamil').editable({
            type: 'text',
            pk: 1,
            name: 'schoolnametamil',
            title: 'Enter School Name in Tamil'
        });        
        $('#udisecode').editable({
            type: 'text',
            pk: 1,
            name: 'udisecode',
            title: 'Enter Udisecode'
        });

                 var countries = [];
        $.each({
            "BD": "Bangladesh",
            "ID": "Indonesia",
            "UA": "Ukraine",
            "QA": "Qatar",
            "MZ": "Mozambique"
        }, function(k, v) {
            countries.push({
                id: k,
                text: v
            });
        });

        $('#district').editable({
            inputclass: 'form-control input-medium',
            source: countries
        });
         $('#block').editable({
            inputclass: 'form-control input-medium',
            source: countries
        }); 
        $('#eddistrict').editable({
            inputclass: 'form-control input-medium',
            source: countries
        });         
        $('#localbody').editable({
            inputclass: 'form-control input-medium',
            source: countries
        });
         $('#panchayat').editable({
            inputclass: 'form-control input-medium',
            source: countries
        }); 
        $('#habitation').editable({
            inputclass: 'form-control input-medium',
            source: countries
        });   
         $('#assembly').editable({
            inputclass: 'form-control input-medium',
            source: countries
        }); 
        $('#parliament').editable({
            inputclass: 'form-control input-medium',
            source: countries
        });   



            // init editable toggler
            $('#enable').click(function() {
                $('#user .editable').editable('toggleDisabled');
            });


</script>

    </body>

</html>