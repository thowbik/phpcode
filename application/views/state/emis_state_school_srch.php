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
            

  <?php $this->load->view('state/header.php'); ?>

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
                                    

                                        <div class="col-md-12 thumbnail" style="margin-left: 10px; height: 130px;">
                                               <div class="row">
                                    

                                              
                                                <div class="col-md-6">
                                                      <label class="control-label">Select District *</label>
                                                        <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="search_opt" name="emis_state_distid" required="">
                                                                <option value="" >Select </option>
                                                                
                                                               <option value="1">School Name</option>
                                                               <option value="2">Udise Code</option>
                                                                 
                                                                 </select>
                                                         
                                                         </div>
                                                   
                                                    
                                                    </div>
                                                    <div class="row search_grp" id="1">
                                                    <!-- <div class="col-md-12 " > -->
                                                      <div class="col-md-4">
                                                      <label class="control-label">Select District *</label>
                                                        <select class="form-control" data-placeholder="Choose a Category" tabindex="1" id="emis_state_distid" name="emis_state_distid" required="">
                                                                <option value="" >Select District *</option>
                                                                <?php foreach($dist as $d) {   ?>
                                                               <option value="<?php echo $d->id;  ?>" ><?php echo $d->district_name ?></option>
                                                                 <?php   }  ?>
                                                                 </select>
                                                         <font style="color:#dd4b39;"><div id="emis_state_distid_alert"></div></font>
                                                         </div>
                                                        <div class="col-md-6">
                                                         <label class="control-label">Enter School Name *</label>
                                                         <input type="text" class="form-control" id="emis_state_school_name" name="emis_state_school_name" placeholder="School name" required=""> 
                                                         <font style="color:#dd4b39;"><div id="emis_state_school_name_alert"><?php if(isset($error3)){ ?> <?php echo $error3;?> <?php } ?></div></font>
                                                         
                                                         </div>
                                                         <div class="col-md-2" >
                                                          <button type="submit" class="btn green" id="emis_sch_searchstate_sub" style="margin-top: 23px;" onclick="search();">Search</button>

                                                          </div>
                                                          <!-- </div> -->
                                                        </div>
                                                        <div class="row search_grp" id="2">
                                                          <div class="col-md-6" >
                                                         <label class="control-label">Enter Udise Code *</label>
                                                         <input type="text" class="form-control" id="emis_state_udise_code" name="emis_state_udise_code" placeholder="School name" required=""> 
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
               function savedistrictid(value){
				
                var baseurl='<?php echo base_url(); ?>';
                // alert(value);
                $.ajax({
                type: "POST",
                url:baseurl+'State/savedistrictidsession',
                data:"&dist_id="+value,
                success: function(resp){ 
                if(resp==true){  
                window.location.href = baseurl+'State/emis_state_block_count'; 
                return true;  
                 }else{
                    return false;
                 }
                 
                         
                 },
                error: function(e){ 
                alert('Error: ' + e.responseText);
                return false;  

                }
                });
               }
              </script>
              <script type="text/javascript">
                $(document).ready(function(){
                $(".search_grp").hide();
                $(".sch_det_grp").hide();
    // availableTags = parseJSON(availableTags);
    
                })
                $("#search_opt").change(function()
                {
                    $(".search_grp").hide();
                    var val = $(this).val();
                    $("#"+val).show();
                });

              var availableTags = ['test','test1'];
              var baseurl = '<?=base_url()?>';
              var query = {'query':query,'id':1};
              
              
    $("#emis_state_school_name").autocomplete({

      onSearchStart: function (query) {

          query.id = $("#emis_state_distid").val();
          
            
                $('#emis_state_school_name').autocomplete();
            },

            //params:{ entity_type : $('#booking_r_city').val()},
            serviceUrl: baseurl + "state/emis_districtwise_school",
            
    });

    function search()
    {
        var search = $("#search_opt").val();
        var dist_id = $("#emis_state_distid").val();
        var sch_name = $("#emis_state_school_name").val();
        //alert(sch_name)
        var udise_code  = $("#emis_state_udise_code").val();
        var data = '';
        if(search==1){
          data = {'dist_id':dist_id,'sch_name':sch_name,'search':search};
        }else
        {
          data = {'dist_id':'','sch_name':udise_code,'search':search};
        }
        $.ajax({
            method:"POST",
            dataType:"JSON",
            data:data,
            url:baseurl+'State/emis_state_school_details',
            success:function(res)
            {
                console.log(res);

                text_data('emis_school_name',res.school_name);
                text_data('emis_cate',res.category_name);
                text_data('emis_manage',res.manage_name);
                text_data('emis_dist',res.district_name);
                text_data('emis_block',res.block_name);
                text_data('emis_sch_eng',res.school_name);
                text_data('emis_sch_sht_name',res.sch_shortname);
                text_data('mana_cate',res.category_name);
                text_data('emis_mange_det',res.management);
                text_data('emis_sch_cate',res.category_name);
                text_data('emis_direct_det',res.department);
                text_data('emis_direct',res.department);

                var type = '';
                switch(parseInt(res.school_type_id))
                {
                    case 1:
                    type = 'Co-Ed';
                    break;
                    case 2:
                    type = 'Girls';
                    break;
                    case 3:
                    type = 'Boys';
                    break;
                }
                text_data('emis_type',type);
                text_data('emis_minority',(res.minority_sch !=0?'Yes':'No'));
                text_data('rte',(res.rte !=''?res.rte:res.rte));
                text_data('emis_low',res.low_class);
                text_data('emis_high',res.high_class);
                text_data('emis_last_renewal',res.certifi_no);
                text_data('emis_certi',res.category_name);
                text_data('emis_lat',res.category_name);
                text_data('emis_long',res.category_name);
                text_data('emis_lat',res.latitude);
                text_data('emis_long',res.longitude);
                text_data('emis_edu_dist_name',res.edu_dist_name);
                text_data('emis_edu_block',res.block_name);
                //sch details
                var hill = '';
                switch(parseInt(res.hill_frst))
                {
                  case 0:
                  hill = 'Not Applicable';
                  break;
                  case 1:
                  hill = 'Forest/Hill area';
                  break;
                  case 2:
                  hill = 'Near Forest/Hill area';
                  break;
                  case 3:
                  hill = 'Near the High ways';
                  break;
                  case 4:
                  hill = 'Near Coastal Area';
                  break;

                }
                text_data('emis_situated',res.hill_frst);
                text_data('emis_email',res.sch_email);
                text_data('emis_resident',(res.resid_schl==1?'Yes':'No'));
                text_data('emis_resident_type',res.RESITYPE_DESC);
                // text_data('emis_resident_type',res.block_name);
                text_data('emis_anganwadi',(res.anganwadi==1?'Yes':'No'));
                text_data('emis_anganwadi_no',res.anganwadi_center);
                text_data('emis_tot_works',res.angan_wrks);
                text_data('emis_tot_child',res.angan_childs);
                text_data('emis_shift_sch',(res.shftd_schl==1?'Yes':'No'));
                text_data('emis_cwsn',(res.cwsn_scl==1?'Yes':'No'));
                text_data('emis_add1',res.address);
                text_data('emis_add2','');
                text_data('emis_mbl_no',res.corr_mobile);
                text_data('emis_land_no',res.corr_landlline);



                $(".sch_det_grp").show();
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