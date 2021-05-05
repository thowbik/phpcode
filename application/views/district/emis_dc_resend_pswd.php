<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
    
    <link href="<?php echo base_url().'asset/pages/css/about.min.css';?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url().'asset/global/plugins/simple-line-icons/simple-line-icons.min.css';?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('head.php'); ?>
        <!-- BEGIN PAGE LEVEL STYLES -->
    
       
        <!-- END PAGE LEVEL STYLES -->

        </head>
        <style>
        .autocomplete-suggestions {
          cursor: pointer;
          background-color: gainsboro !important;
          z-index: 0 !important;
          display: table;
      }
        .autocomplete-suggestion {
          padding-top: 2px !important;
        }
      </style>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            

  <?php $this->load->view('district/header.php'); ?>

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
                                        <h1>School search
                                            <small>Search school to access school rights</small>
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
                                    <div class="portlet-body">
                                     
                                
                                     <div class="row">
                                    

                                        <div class="col-md-12 thumbnail" style="margin-left: 10px; height: 220px;">
                                               <div class="row">
                                    

                                              
                                                <div class="col-md-6">
                                                      <label class="control-label">Select Option *</label>
                                                        <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="search_opt" name="emis_state_blockid" required="">
                                                                <option value="" >Select </option>
                                                                
                                                               <option value="1">School Name</option>
                                                               <option value="2">Udise Code</option>
                                                                 
                                                                 </select>
                                                         
                                                         </div>
                                                   
                                                    
                                                    </div>
                                                    <div class="row search_grp" id="1">
                                                    <!-- <div class="col-md-12 " > -->
                                                      <div class="col-md-4">
                                                      <label class="control-label">Select Block *</label>
                                                        <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_state_blockid" name="emis_state_blockid" required="">
                                                                <option value="" >Select Block *</option>
                                                                <?php foreach($dist as $d) {   ?>
                                                               <option value="<?php echo $d->id;  ?>" ><?php echo $d->block_name ?></option>
                                                                 <?php   }  ?>
                                                                 </select>
                                                         <font style="color:#dd4b39;"><div id="emis_state_blockid_alert"></div></font>
                                                         </div>
                                                        <div class="col-md-6">
                                                         <label class="control-label">Enter School Name *</label>
                                                         <input type="text" class="form-control" id="emis_state_school_name" name="emis_state_school_name" placeholder="School name" required=""> 
                                                         <font style="color:#dd4b39;"><div id="emis_state_school_name_alert"><?php if(isset($error3)){ ?> <?php echo $error3;?> <?php } ?></div></font>
                                                         
                                                         </div>
                                                         <div class="col-md-6">
                                                         <label class="control-label">Enter Email *</label>
                                                         <input type="text" pattern="[A-Za-z]{3}" class="form-control" id="email_id" name="email_id" placeholder="emailid" required=""> 
                                                         <font style="color:#dd4b39;"><div id="email_id_alert"><?php if(isset($error3)){ ?> <?php echo $error3;?> <?php } ?></div></font>
                                                         
                                                         </div>
                                                         <div class="col-md-2" >
                                                          <input type="submit" class="btn green" id="emis_sch_searchstate_sub" style="margin-top: 23px;" onclick="search();">

                                                          </div>
                                                          <!-- </div> -->
                                                        </div>
                                                        <div class="row search_grp" id="2">
                                                          <div class="col-md-6" >
                                                         <label class="control-label">Enter Udise Code *</label>
                                                         <input type="text" class="form-control" id="emis_state_udise_code" name="emis_state_udise_code" placeholder="UDISE Code" required=""> 
                                                         <font style="color:#dd4b39;"><div id="emis_state_udise_code_alert"><?php if(isset($error3)){ ?> <?php echo $error3;?> <?php } ?></div></font>
                                                         </div>

                                                         <div class="col-md-6">
                                                         <label class="control-label">Enter Email *</label>
                                                         <input type="text" pattern="[A-Za-z]{3}" class="form-control" id="email_id_udise" name="email_id_udise" placeholder="emailid" required=""> 
                                                         <font style="color:#dd4b39;"><div id="email_id_udise_alert"><?php if(isset($error3)){ ?> <?php echo $error3;?> <?php } ?></div></font>
                                                         
                                                         </div>
                                                         
                                                         <div class="col-md-2" >
                                                          <button type="submit" class="btn green" id="emis_sch_searchstate_sub" style="margin-top: 23px;" onclick="search();">Search</button>

                                                          </div>
                                                    
                                                    
                                                </div>
                                              </div>
                                            </div>

                                   

                                     <div class="row sch_det_grp">
                                     <div class="col-md-12">

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px;">
                                                <div class="dashboard-stat2" style="height: auto;">
                                                    <div class="display">
                                                      
                                                    <div class="col-md-12" style="text-align:center !important;"> 
                                                        <div class="col-md-11">
                                                            <h3 class="font-green-sharp">
                                                               <i class="fa fa-bank"></i> <span id="emis_school_name"></span>                                                              
                                                            </h3> 
                                                          </div>
                                                          <div class="col-md-1" style="text-align:right !important;"> 
                                                      <button type="submit" class="btn green" id="" style="margin-top: 23px;" >Edit</button>
                                                    </div>
                                                          </div>
                                                          <div class="col-md-12"> 
                                                              <div class="col-md-4"> 
                                                              <font style="color:#9b9b9b;"><i class="fa fa-map-marker"></i> Category : <span style="color:#111;" id="emis_cate"> </span></font> 
                                                              </div>  
                                                              <div class="col-md-8"> 
                                                              <font style="color:#9b9b9b;"><i class="fa fa-calendar"></i> Management : <span style="color:#111;" id="emis_manage"></span></font>  
                                                              </div> 
                                                              <div class="col-md-4"> 
                                                              <font style="color:#9b9b9b;"><i class="fa fa-briefcase"></i> District : <span style="color:#111;" id="emis_dist"></span></font>
                                                              </div> 
                                                              <div class="col-md-8"> 
                                                              <font style="color:#9b9b9b;"><i class="fa fa-briefcase"></i> Directorate : <span style="color:#111;" id="emis_direct"></span></font> 
                                                              </div> 
                                                              <div class="col-md-4"> 
                                                              <font style="color:#9b9b9b;"><i class="fa fa-briefcase"></i> Block : <span style="color:#111;" id="emis_block"></span></font> 
                                                              </div> 
                                                            </div> 

                                                             <div class="col-md-12">
                                                             <h5 style="background-color:#abe7ed;padding: 10px;">School Management Details</h5>
                                                            <div class="col-md-6"> 
                                                              <font style="color:#9b9b9b;"> Name of the School in English : <span style="color:#111;" id="emis_sch_eng"></span></font> 
                                                              </div> 
                                                              <div class="col-md-6"> 
                                                              <font style="color:#9b9b9b;"> Short Name of the School in English : <span style="color:#111;" id="emis_sch_sht_name"></span></font> 
                                                              </div> 
                                                              <div class="col-md-6"> 
                                                              <font style="color:#9b9b9b;"> School Management Category : <span style="color:#111;" id="mana_cate"></span></font> 
                                                              </div> 

                                                               <div class="col-md-6"> 
                                                              <font style="color:#9b9b9b;"> School Management : <span style="color:#111;" id="emis_mange_det"></span></font> 
                                                              </div> 
                                                              <div class="col-md-6"> 
                                                              <font style="color:#9b9b9b;"> School Department : <span style="color:#111;" id="emis_direct_det"></span></font> 
                                                              </div> 
                                                              <div class="col-md-6"> 
                                                              <font style="color:#9b9b9b;"> School Category : <span style="color:#111;" id="emis_sch_cate"></span></font> 
                                                              </div> 

                                                               <div class="col-md-6"> 
                                                              <font style="color:#9b9b9b;"> School Type  : <span style="color:#111;" id="emis_type"></span></font> 
                                                              </div> 
                                                              <div class="col-md-6"> 
                                                              <font style="color:#9b9b9b;">Minority School : <span style="color:#111;" id="emis_minority"></span></font> 
                                                              </div> 
                                                              <div class="col-md-6"> 
                                                              <font style="color:#9b9b9b;"> RTE School : <span style="color:#111;" id="rte"></span></font> 
                                                              </div> 

                                                               <div class="col-md-6"> 
                                                              <font style="color:#9b9b9b;"> Lowest Class : <span style="color:#111;" id="emis_low"></span></font> 
                                                              </div> 
                                                              <div class="col-md-6"> 
                                                              <font style="color:#9b9b9b;"> Highest Class : <span style="color:#111;" id="emis_high"></span></font> 
                                                              </div> 
                                                              <div class="col-md-6"> 
                                                              <font style="color:#9b9b9b;">Year Of Last Renewal : <span style="color:#111;" id="emis_last_renewal"></span></font> 
                                                              </div> 

                                                               <div class="col-md-6"> 
                                                              <font style="color:#9b9b9b;"> Renewal Certificate Number / File Number : <span style="color:#111;" id="emis_certi"></span></font> 
                                                              </div> 
                                                              <div class="col-md-6"> 
                                                              <font style="color:#9b9b9b;"> Latitude : <span style="color:#111;" id="emis_lat"></span></font> 
                                                              </div> 
                                                              <div class="col-md-6"> 
                                                              <font style="color:#9b9b9b;"> Longitude : <span style="color:#111;" id="emis_long"></span></font> 
                                                              </div> 

                                                              <div class="col-md-6"> 
                                                              <font style="color:#9b9b9b;"> Education District Name : <span style="color:#111;" id="emis_edu_dist_name"></span></font> 
                                                              </div> 
                                                              <div class="col-md-6"> 
                                                              <font style="color:#9b9b9b;">Block Name : <span style="color:#111;" id="emis_edu_block"></span></font> 
                                                              </div> 
                                                            </div>

                                                            <div class="col-md-12">
                                                                <h5 style="background-color:#abe7ed;padding: 10px;">School Details</h5>
                                                                <div class="col-md-6"> 
                                                                <font style="color:#9b9b9b;"> School Situated IN : <span style="color:#111;" id="emis_situated"></span></font> 
                                                                </div>
                                                                <div class="col-md-6"> 
                                                                <font style="color:#9b9b9b;"> Email Address  : <span style="color:#111;" id="emis_email"> </span></font> 
                                                                </div>
                                                                <div class="col-md-6"> 
                                                                <font style="color:#9b9b9b;"> Residential School : <span style="color:#111;" id="emis_resident"></span></font> 
                                                                </div>

                                                                <div class="col-md-6"> 
                                                                <font style="color:#9b9b9b;"> Type of Residential School  : <span style="color:#111;" id="emis_resident_type"> </span></font> 
                                                                </div>
                                                                <div class="col-md-6"> 
                                                                <font style="color:#9b9b9b;"> Anganwadi is Attached To School  : <span style="color:#111;" id="emis_anganwadi"> </span></font> 
                                                                </div>
                                                                <div class="col-md-6"> 
                                                                <font style="color:#9b9b9b;"> Anganwadi Number : <span style="color:#111;" id="emis_anganwadi_no"> </span></font> 
                                                                </div>

                                                                <div class="col-md-6"> 
                                                                <font style="color:#9b9b9b;"> Total Number of Workers : <span style="color:#111;" id="emis_tot_works"> </span></font> 
                                                                </div>
                                                                <div class="col-md-6"> 
                                                                <font style="color:#9b9b9b;"> Total Number of Children : <span style="color:#111;" id="emis_tot_child"> </span></font> 
                                                                </div>
                                                                <div class="col-md-6"> 
                                                                <font style="color:#9b9b9b;"> Shift School : <span style="color:#111;" id="emis_shift_sch"> </span></font> 
                                                                </div>
                                                                <div class="col-md-6"> 
                                                                <font style="color:#9b9b9b;"> School for CWSN : <span style="color:#111;" id="emis_cwsn">yes </span></font> 
                                                                </div>
                                                                <div class="col-md-6"> 
                                                                <font style="color:#9b9b9b;"> Address 1 : <span style="color:#111;" id="emis_add1"> </span></font> 
                                                                </div>
                                                                <div class="col-md-6"> 
                                                                <font style="color:#9b9b9b;"> Address 2 : <span style="color:#111;" id="emis_add2"> </span></font> 
                                                                </div>
                                                                <div class="col-md-6"> 
                                                                <font style="color:#9b9b9b;"> Mobile Number : <span style="color:#111;" id="emis_mbl_no"> </span></font> 
                                                                </div>
                                                                <div class="col-md-6"> 
                                                                <font style="color:#9b9b9b;"> Landline Number : <span style="color:#111;" id="emis_land_no"> </span></font> 
                                                                </div>
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
        <script src="<?php echo base_url().'asset/js/state.js';?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/js/autocomplete/jquery.autocomplete.js';?>"></script>


         <script type="text/javascript">
              //  function validateEmail() 
              //   {
                  
              //     var mail = document.getElementById("email_id");
              //     alert(mail);
              //   if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
              //     {
              //       return (true)
              //     }
              //       alert("You have entered an invalid email address!")
              //       return (false)
              //   }
              </script>
              <script type="text/javascript">
                $(document).ready(function(){
                $(".search_grp").hide();
                $(".sch_det_grp").hide();
    // availableTags = parseJSON(availableTags);
    
                })
                $("#search_opt").change(function()
                {
                  //alert("shlname");
                    $(".search_grp").hide();
                    var val = $(this).val();
                    $("#"+val).show();
                });

              var availableTags = ['test','test1'];
              var baseurl = '<?=base_url()?>';
              var query = {'query':query,'id':1};
              
              
    $("#emis_state_school_name").autocomplete({

      onSearchStart: function (query) {

          query.id = $("#emis_state_blockid").val();
                $('#emis_state_school_name').autocomplete();
            },

            //params:{ entity_type : $('#booking_r_city').val()},
            serviceUrl: baseurl + "state/emis_blockwise_school",
            
    });

    function search()
    {
        var search = $("#search_opt").val();
        var block_id = $("#emis_state_blockid").val();
        var sch_name = $("#emis_state_school_name").val();
        var email_id = $("#email_id").val();
        var email_id_udise = $("#email_id_udise").val();

        var udise_code  = $("#emis_state_udise_code").val();
        var data = '';
        if(search==1){
          data = {'block_id':block_id,'sch_name':sch_name,'email_id':email_id,'search':search};
        }else
        {
          data = {'block_id':'','sch_name':udise_code,'email_id':email_id_udise,'search':search};
        }
        $.ajax({
            method:"POST",
            dataType:"JSON",
            data:data,
            url:baseurl+'State/schl_pswd_resend',
            success:function(res)
            {
              console.log(res);
              if(res==true){
                alert("Mail send successfully");
                location.reload();
              }else{
                alert("Mail not send");
              }
              
            }
        })

        function text_data(id,val)
        {
            $("#"+id).html(val);
        }
    }
  
              </script>


    </body>

</html>