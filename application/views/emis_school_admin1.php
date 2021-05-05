<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
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
                          
            <?php $is_high_class = $this->session->userdata('emis_school_highclass');

                ?>
            <?php $user_type_id = $this->session->userdata('emis_user_type_id'); ?> 
                                    <div class="page-content-inner">
                                       
                                        <?php $this->load->view('emis_school_profile_header1.php'); ?>
                                        

                                           <!-- <div class="m-heading-1 border-green m-bordered">
                                            <h3>Basic Information</h3>
                                        </div> -->
                                        <div class="portlet-body">
                                               <div class ="row">
                                                    <div class="col-md-4">
                                                        <font style="color:#dd4b39;">
                                                            <?php echo $this->session->flashdata('errors'); ?>
                                                        </font>
                                                    </div>
                                                </div>
                                            </div>
                                         <div class="portlet-body">
                                         <div class="mt-element-step">
                                            <div class="row step-thin">
                                                <a href="<?php echo base_url().'Admin/emis_school_admin1';?>"><div class="col-md-2 bg-grey mt-step-col active">
                                                    <div class="mt-step-number bg-white font-grey">1</div>
                                                    <div class="mt-step-title uppercase font-grey-cascade">Admin</div>
                                                    <div class="mt-step-content font-grey-cascade">Information</div>
                                                </div></a>
                                                <a href="<?php echo base_url().'Admin/emis_school_admin2';?>"><div class="col-md-2 bg-grey mt-step-col">
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
                                                    <span class="caption-subject font-dark sbold uppercase">Administrative Information step 1</span>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table id="user" class="table table-bordered table-striped">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="width:15%"> School ID: </td>
                                                                    <td style="width:50%">
                                                                      <?php if ($user_type_id != 7) { ?>
                                                                        <?php echo $school_key_id;; ?> 
                                                                        <?php } else { ?>
                                                                        <a href="javascript:;" id="schoolid" data-type="text" data-pk="0" data-url="<?php echo base_url().'Admin/updateschoolid';?>"  data-original-title="Enter School Id"> <?php echo $school_key_id; ?> </a> 
                                                                         <?php } ?>
                                                                          
                                                                    </td>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td> Type of the School: </td>
                                                                    <td>
                                                                        <a href="javascript:;" id="typeofschool" data-type="select2" data-pk="1" data-value="<?php echo $type_school; ?>" data-url="<?php echo base_url().'Admin/updateschooltype';?>" data-original-title="Select type"> </a>
                                                                    </td>
                                                                    
                                                                </tr>

                                                                <tr>
                                                                    <td> Lowest Standard: </td>
                                                                    <td>
                                                                        <a href="javascript:;" id="loweststd" data-type="select2" data-pk="1" data-original-title="Select Standard" data-value="<?php echo $low_class; ?>" data-url="<?php echo base_url().'Admin/updatelowstd';?>"  data-original-title="Enter Lowest Standard">  </a> 
                                                                    </td>
                                                                    
                                                                </tr>

                                                                <tr>
                                                                    <td> Highest Standard: </td>
                                                                    <td>
                                                                        <a href="javascript:;" id="higheststd" data-type="select2" data-pk="1" data-original-title="Select Standard" data-value="<?php echo $high_class; ?>" data-url="<?php echo base_url().'Admin/updatehighstd';?>"  data-original-title="Enter Highest Standard:">  </a> 
                                                                    </td>
                                                                    
                                                                </tr>

                                                                <tr>
                                                                    <td> Is SMC / SMDC Functioning in the School: </td>
                                                                    <td>
                                                                        <a href="javascript:;" id="smcsmdc" data-type="select2" data-pk="1" data-value="<?php echo $smc; ?>" data-url="<?php echo base_url().'Admin/updatesmc';?>"  data-original-title="Select yes or no"> </a>
                                                                    </td>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td > Board of Education followed by the School:</td>
                                                                    <td >
                                                                        <a href="javascript:;" id="boardofedu" data-type="select2" data-pk="1" data-value="<?php echo $board; ?>" data-url="<?php echo base_url().'Admin/updateboard';?>"  data-original-title="Select type"> </a> 
                                                                    </td>
                                                                    
                                                                </tr>

                                                               <tr>
                                                                    <td> Medium of instruction Available in the School: </td>
                                                                    <td>
                                                                        <a href="javascript:;" id="mediumofins" data-type="checklist" data-value= <?php echo $selected_mediums; ?> data-original-title="Select Medium of Instruction" data-url="<?php echo base_url().'Admin/updatemedium';?>" </a>
                                                                    </td>
                                                                    
                                                                </tr>

                                                                <tr>
                                                                    <td> Languages taught as a subject at the primary stage (mention upto three languages below): </td>
                                                                    <td>
                                                                        <a href="javascript:;" id="languagestaughtasasubject" data-type="checklist" data-value= <?php echo $selected_mediums; ?> data-original-title="Select Languages taught as a subject" data-url="<?php echo base_url().'Admin/updatelanguagestaughtasasubject';?>" </a>
                                                                    </td>
                                                                    
                                                                </tr>

                                                                <tr>
                                                                    <td style="width:15%"> Total No. of Mediums are available in the School:</td>
                                                                    <td style="width:50%" id ="noof">
                                                                        <?php echo $noof_med; ?> 
                                                                    </td>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td> Minority school: </td>
                                                                    <td>
                                                                        <a href="javascript:;" id="minorityschool" data-type="select2" data-pk="1" data-value="<?php echo $minority; ?>" data-url="<?php echo base_url().'Admin/updateminority';?>"  data-original-title="Select Status"> </a>
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



      /*  $('#loweststd').editable({
            type: 'text',
            pk: 1,
            name: 'low_class',
            title: 'Enter Lowest Standard',
            success: function(response, newValue) {
                     if(response == 0) return "Unable to update.Please try later"; 
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             }/*,
            validate: function(value){
                if(! /^[a-zA-Z ]*$/.test(value))
                {
                    return 'Invalid Standard Name';
                }
            } 
        });    */    
        /*$('#higheststd').editable({
            type: 'text',
            pk: 1,
            name: 'higheststd',
            title: 'Enter Hightest Standard',
            success: function(response, newValue) {
                     if(response == 0) return "Unable to update.Please try later"; 
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             }/*,
            validate: function(value){
                if(! /^[a-zA-Z ]*$/.test(value))
                {
                    return 'Invalid Standard Name';
                }
            } 
        }); */
      /*  $('#boardofedu').editable({
            type: 'text',
            pk: 1,
            name: 'board',
            title: 'Enter Board of Education',
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             }/*,
            validate: function(value){
                if(! /^[a-zA-Z ]*$/.test(value))
                {
                    return 'Invalid board name';
                }
            } 
        });     */    
        $('#noofmedium').editable({
            type: 'text',
            pk: 1,
            name: 'noof_med',
            title: 'Enter the number of mediums in school',
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(! /^\d+$/.test(value))
                {
                    return 'Invalid number';
                }
            }
        });

        var countries = [];
        $.each({
            "YE": "YES",
            "NO": "NO",
            "CO": "Co-Ed",
        }, function(k, v) {
            countries.push({
                id: k,
                text: v
            });
        });

        var std = [];
        $.each({
            "1": "I Std",
            "2": "II Std",
            "3": "III Std",
            "4": "IV Std",
            "5": "V Std",
            "6": "VI Std",
            "7": "VII Std",
            "8": "VIII Std",
            "9": "IX Std",
            "10": "X Std",
            "11": "XI Std",
            "12": "XII Std"



        }, function(k, v) {
            std.push({
                id: k,
                text: v
            });
        });
        
        var yesno = [];

        $.each({
            "Yes": "YES",
            "No": "NO",
            
            }, function(k, v) {
            yesno.push({
                id: k,
                text: v
            });
        });

        var yesnonew = [];

        $.each({
            "1": "YES",
            "0": "NO",
            
            }, function(k, v) {
            yesnonew.push({
                id: k,
                text: v
            });
        });

        var board = []
        $.each({
            "State Board": "State Board",
            "CBSC": "CBSC"
            
            }, function(k, v) {
            board.push({
                id: k,
                text: v
            });
        });

        var type=[]
        $.each({
            "Co-Ed":"Co-Ed",
            "Girls":"Girls",
            "Boys":"Boys"
            
            }, function(k, v) {
            type.push({
                id: k,
                text: v
            });
        });


        var medium=[]
        <?php foreach($mediums as $k => $v){ ?>
                medium.push({value: '<?php echo $k; ?>', text: '<?php echo $v; ?>'});
        <?php } ?>

        $('#higheststd').editable({
            inputclass: 'form-control input-medium',
            source: std,
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else
                     {
                        location.reload();
                     }
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(! /^([1-9]|1[0-2])$/.test(value))
                {
                    return 'Invalid Standard';
                }
            }
        }); 

        $('#loweststd').editable({
            inputclass: 'form-control input-medium',
            source: std,
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else 
                     toastr.success("Lowest Standard updated sucessfully", "Update Notifications");
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(! /^([1-9]|1[0-2])$/.test(value))
                {
                    return 'Invalid Standard';
                }
            }
        }); 

         $('#typeofschool').editable({
            inputclass: 'form-control input-medium',
            source: type,
             success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                     else 
                     toastr.success("Type of school updated sucessfully", "Update Notifications");
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(!value.trim())
                {
                    return 'School type cannot be empty';
                }
            }
        }); 
         $('#smcsmdc').editable({
            inputclass: 'form-control input-medium',
            source: yesno,
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
                if(value != "Yes" && value != "No")
                {
                     return 'Invalid data';

                }
            }
        }); 
         $('#minorityschool').editable({
            inputclass: 'form-control input-medium',
            source: yesnonew,
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
                     return 'Invalid data';

                }
            }
        }); 
        $('#boardofedu').editable({
            inputclass: 'form-control input-medium',
            source: board,
            success: function(response, newValue) {
                      var result = $.parseJSON(response);
                     if(result.response_code != 1) return result.error_msg;
                    if(result.response_code == 1)  return location.reload();
            
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(! /^[a-zA-Z ]*$/.test(value))
                {
                    return 'Invalid Board';
                }
            }
        });
         $('#schoolid').editable({
            type: 'text',
            pk: 1,
            name: 'school_key_id',
            title: 'Enter School ID',
            success: function(response, newValue) {
                     if(response == 0) return "Unable to update.Please try later"; 
                      else 
                     toastr.success("School id updated sucessfully", "Update Notifications");
            
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
            validate: function(value){
                if(! /^\d+$/.test(value))
                {
                    return 'Invalid school id';
                }
            }
            });
         
  
        $('#mediumofins').editable({
            pk: 1,
            limit: 3,
            source: medium,

            success: function(response, newValue) {
              document.getElementById('noof').innerHTML = $('input:checkbox:checked').length;
             
                    
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
        });



         $('#languagestaughtasasubject').editable({
            pk: 1,
            limit: 3,
            source: medium,

            success: function(response, newValue) {
              // document.getElementById('noof').innerHTML = $('input:checkbox:checked').length;
             
                    
            },
            error: function(response, newValue) {
                     return 'Service unavailable. Please try later.';
             },
        });


            // init editable toggler
             $('#user .editable').editable('toggleDisabled');
            $('#enable').click(function() {
                $('#user .editable').editable('toggleDisabled');
            });


</script>

    </body>

</html>